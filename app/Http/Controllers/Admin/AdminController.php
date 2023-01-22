<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Throwable;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.administrators', [
            'admins' => Admin::orderBy('last_seen','desc')->get(),
        ]);
    }

    public function getAll()
    {
        $administrators = Admin::all();

        try {
            return response()->json(
                [
                    'data' => $administrators,
                ],200);
        } catch (Throwable $e) {
            return response()->json(
                [
                    'message' => $e,
                ],300);
        }

    }

    public function store(Request $request)
    {
//        dd(Hash::make($request->password));
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->img = $request->img;
        $admin->phone_number = $request->phone;
        $admin->role = $request->role;
        $admin->password = Hash::make($request->password);
        try {
            $admin->save();
            return response()->json(
                [
                    'data' => 'successful',
                    'message' => 'Administrator Successfully Added ',
                    'status' => 200
                ]
            );
        } catch (Throwable $e) {
            return response()->json(
                [
                    'data' => 'Fail',
                    'message' => $e,
                    'status' => 300
                ]
            );
        }


    }

    public function show(Request $request)
    {
        $admin = Admin::find($request->id);
        return response()->json(
            [
                'data' => $admin,
                'status' => 200
            ]
        );
    }

    public function update(Request $request)
    {
        $admin = Admin::find($request->id);
        $admin->name = $request->name;
        $admin->img = $request->img;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone;
        $admin->role = $request->role;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function delete(Request $request)
    {
        Admin::find($request->id)->delete();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }
}