<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Utility\EmailUtility;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
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
        $blog=Blog::find($request->id);
        return response()->json(
            [
                'data' =>  $blog,
                'status' => 200
            ]
        );
    }
}