<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserNotification;
use App\Partner;
use App\Payment;
use App\Services\ResponseService;
use App\User;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.visa-applicant');
    }

    public function listUsers()
    {
        return view('admin.user.list-users', [
            'users' => User::all(),
        ]);
    }

    public function promoteToPartner(Request $request)
    {
        try {
            $user = User::query()->find($request->user_id);

            if ($user != null) {
//                dd();
                $partner = Partner::query()->firstOrCreate(
                    ['email' => $user->email],
                    [
//                        'password' => bcrypt(str_random(10)),
                        'name' => $user->name,
                        'password' => $user->password,
                        'img' => $user->img,
                        'phone_number' => $user->phone
                    ]
                );
                return ResponseService::jsonRes(true, $partner, 'User Promote Successfully!', '', 200);
            } else {
                return ResponseService::jsonRes(false, false, 'User Not Found!', '', 200);
            }
        } catch (\Exception $exception) {
            return ResponseService::jsonRes(false, false, $exception->getMessage(), $exception->getLine(), 200);
        }

    }

    public function type(Request $request)
    {
        $data = User::where('type', $request->type)->get();
        return response()->json(
            [
                'data' => $data,
                'status' => 200
            ]
        );
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->type = $request->type;
        $user->password = Hash::make($request->password);
        $img = $request->img;
        $user->reset_pass = "0";
        if ($request->partner_id) {
            $user->partner_id = $request->partner_id;
        }
        $user->status = 1;
        if ($img != null) {
            $image = File::where('id', $img)->first();
            $user->img = $image->img;
        }
        $user->save();
        if ($user->type == 1) {
            $user->slug = Str::random(120) . time();
            $user->save();
            Mail::to($user->email)->send(new UserNotification($user->name, $user->id, $user->slug));
        }
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);
        $partner = User::where('id', $user->partner_id)->first();
        $pays = Payment::where('user_id', $user->id)->get();
        $isPay = count($pays) > 0 ? true : false;
        $imgId = File::where('img', $user->img)->get()->first();
        $user['img_id'] = $imgId ? $imgId->id : "";
        $user['partner'] = $partner;
        $user['isPay'] = $isPay;
        $user['pays'] = $pays;
        return response()->json(
            [
                'data' => $user,
                'status' => 200
            ]
        );
    }

    public function status(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->age = $request->age;
        $img = $request->img;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->partner_id) {
            $user->partner_id = $request->partner_id;
        }

        if ($img) {
            $img = File::where('id', $request->img)->first();
            $user->img = $img->img;
        }
        $user->save();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    //socialite
    public function setType(Request $request)
    {
        $user = User::find($request->id);
        $user->type = 1;
        $user->save();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }
}