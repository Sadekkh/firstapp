<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class activeUsers extends Controller
{
    public function updateExitTime(Request $request)
    {
        $ip = $request->ip();

        if ($ip) {
            DB::table('visitors')
                ->where('ip_address', $ip)
                ->latest()
                ->update(['exit_time' => Carbon::now()]);
        }

        return response()->json(['message' => 'Exit time updated']);
    }
}
