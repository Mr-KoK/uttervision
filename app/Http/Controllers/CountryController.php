<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getall()
    {
        $blogs = Blog::paginate(16);;
        return response()->json(
            [
                'data' =>  $blogs,
                'status' => 200
            ]
        );
    }
    public function show(Request $request){
        if (Country::where('slug',$request->slug)->get()->first()){
            return view('public.visa-country',[
                'country' => Country::where('slug',$request->slug)->get()->first()
            ]);
        }else{
            return redirect()->to('404');
        }

    }
}