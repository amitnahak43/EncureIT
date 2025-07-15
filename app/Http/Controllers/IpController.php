<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Cookie;

class IpController extends Controller
{
    //

    public function show(Request $request)
    {
        $location = Location::get();

        $ip= $location->ip;
        $countryName = $location->countryName;
        $cityName = $location->cityName;

        Cookie::queue('ip_address',$ip,1440);
        Cookie::queue('countryName',$countryName,1440);
        Cookie::queue('cityName',$cityName,1440);
        
        return view('ip_info', compact('ip','cityName','countryName'));
    }
}
