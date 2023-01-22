<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('public.home',[
            'asia_countries' => Country::where('show_on_map',1)->where('continent','=','asia')->get(),
            'australasia_countries' => Country::where('show_on_map',1)->where('continent','=','australasia')->get(),
            'africa_countries' => Country::where('show_on_map',1)->where('continent','=','africa')->get(),
            'north_america_countries' => Country::where('show_on_map',1)->where('continent','=','north america')->get(),
            'south_america_countries' => Country::where('show_on_map',1)->where('continent','=','south america')->get(),
            'europe_countries' => Country::where('show_on_map',1)->where('continent','=','europe')->get(),
            'map_countries' => Country::where('show_on_map',1)->whereNotNull('points_map')->get(),
        ]);
    }
}
