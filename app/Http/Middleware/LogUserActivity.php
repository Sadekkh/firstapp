<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $responses = $next($request);
        $ip = $request->ip();
        $entryTime = Carbon::now();
        try {
            $url = "http://ip-api.com/php/$ip";
            $response = file_get_contents($url);
            if ($response) {
                $data = unserialize($response);

                if ($data->status === 'success') {
                    $country = $data->country;
                    $city = $data->city;
                }
            }




            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'country' => $country,
                'city' => $city,
                'entry_time' => $entryTime,
                'exit_time' => $entryTime->addMinutes(3),
                'url' => $request->fullUrl(),
            ]);





            return $response;
        } catch (\Exception $e) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,


                'entry_time' => $entryTime,
                'exit_time' => $entryTime->addMinutes(3),
                'url' => $request->fullUrl(),
            ]);


            return $responses;
        }
    }
}
