<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\orders;
use Illuminate\Http\Request;

class adminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = orders::all();

        return view('adminLayouts.order.index', compact('order'));
    }




    public function shows(string $id)
    {

        $order = orders::findorfail($id);
        $cart = carts::with('product')->where('session_id', $order->session_id)->get();


        return view('adminLayouts.order.edit', compact('order', 'cart'));
    }

    public function update(Request $request, string $id)
    {
        $dataToUpdate = $request->all();
        $c = orders::findorfail($id);
        $c->update($dataToUpdate);
        return redirect()->route('admin.order');
    }
    public function order_delivered(Request $request, string $id)
    {
        $status = $request->input('status');
        $c = orders::findorfail($id);
        $c->status = $status;
        $c->save();
        return redirect()->route('admin.order');
    }
}
