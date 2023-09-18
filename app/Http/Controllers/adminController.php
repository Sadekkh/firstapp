<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\visitors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(Request $request)
    {

        $totalmoneys = DB::select("select sum(total) as total from orders");
        $totalmoney = number_format($totalmoneys[0]->total, 2);
        $order = DB::select("select * from orders");
        $orderbytype = DB::select("select count(*) as total,status from orders group by status");
        $orderbyday = DB::select("select count(*) as total,date(created_at) as date from orders group by date(created_at) order by date desc limit 30");

        $productbycart = DB::select("SELECT COUNT(*) AS total, p.name_en FROM carts c LEFT JOIN product p ON c.product_id = p.id GROUP BY p.name_en;");
        $productbyorder = DB::select("SELECT COUNT(*) AS total, p.name_en FROM carts c LEFT JOIN product p ON c.product_id = p.id where c.state=2 GROUP BY p.name_en;");

        $onlineusers = DB::table('visitors')
            ->whereBetween('entry_time', [Carbon::now()->subMinutes(3), Carbon::now()->addMinute(3)])
            ->groupBy('ip_address')
            ->get();
        $mostproductviews = DB::select("SELECT COUNT(*) AS count, p.name_en, p.id,  SUBSTRING_INDEX(SUBSTRING_INDEX(v.url, '/', -1), '/', 1) AS extracted_id FROM   visitors v LEFT JOIN
    product p ON SUBSTRING_INDEX(SUBSTRING_INDEX(v.url, '/', -1), '/', 1) = p.id WHERE v.url LIKE '%/add_prod_cart/%' GROUP BY extracted_id ORDER BY count DESC;");
        $visitors = DB::select("select count(*) as count, date(entry_time) as date from visitors group by date(entry_time) order by date");



        return view('adminLayouts.main', compact('totalmoney', 'visitors', 'order', 'orderbytype',  'orderbyday', 'productbycart', 'productbyorder', 'onlineusers', 'mostproductviews'));
    }
}
