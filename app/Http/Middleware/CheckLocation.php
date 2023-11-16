<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;


class CheckLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $latitude1 = Session::get('lat');
        $longitude1 = Session::get('long');


        if($latitude1 != null || $longitude1 != null){
            return $next($request);
        }

        if($latitude1 === null || $longitude1 === null){
            return redirect()->route('get.location');
        }

    }
}
