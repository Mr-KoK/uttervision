<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function getall()
    {
        $blogs = Blog::all();
        return response()->json(
            [
                'data' =>  $blogs,
                'status' => 200
            ]
        );
    }
    public function store(Request $request)
    {
        $img = File::where('id', $request->img)->first();
        $blogs = new Blog;
        $blogs->title = $request->title;
//        $blogs->content = $request->content;
        $blogs->admin_id = Auth::guard('admin')->user()->id;
        $blogs->img = $img->img;
        $blogs->save();
        return response()->json(
            [
                'data' =>  "successfullu",
                'status' => 200
            ]
        );
    }
    public function setActive(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->active = $request->active;
        $blog->save();
        return response()->json(
            [
                'data' =>  "successfullu",
                'status' => 200
            ]
        );
    }
    public function show(Request $request)
    {
        $blog = Blog::find($request->id);
        $imgId = File::where('img', $blog->img)->get()->first();
        $admin = $blog->admin()->get();
        $blog['creator'] = $admin;
        $blog['imgId'] = $imgId ? $imgId->id : "";
        return response()->json(
            [
                'message' => "successfull",
                'data' => $blog,
                'status' => 200
            ]
        );
    }
    public function update(Request $request)
    {
        $img = File::where('id', $request->img)->first();
        $blog = Blog::find($request->id);
        $blog->img = $img->img;
        $blog->admin_id = Auth::guard('admin')->user()->id;
        $blog->title = $request->title;
//        $blog->content = $request->content;
        $blog->save();
        return response()->json(
            [
                'data' => "successfull",
                'status' => 200
            ]
        );
    }
    public function delete(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->delete();
        return response()->json(
            [
                'data' =>  "successfully",
                'status' => 200
            ]
        );
    }
}