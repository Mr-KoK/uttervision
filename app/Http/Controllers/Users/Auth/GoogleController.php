<?php

namespace App\Http\Controllers\Users\Auth;

use App\Admin;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Notifications\NewUserRegister;
use App\Notifications\WelcomeToUser;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        try {
            return Socialite::driver('google')->stateless()->redirect();
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function googleCallBack(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                Auth::guard('web')->loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->img = asset('assets/images/admin/icons/avatar-placeholder.png');
                $user->type = UserType::GoogleRegister;
                $user->google_id = intval($googleUser->id);
                $user->password = Hash::make(str_random(6));
                $user->reset_pass = 1;;
                $user->save();
                $user->userActivate();

                if($googleUser->avatar){
                    $fileContents = file_get_contents($googleUser->avatar);
                    $name = time().$user->id.'-'.$user->google_id.'.jpg';
                    Storage::disk('user_avatars')->put($name, $fileContents);
                    $user->img = Storage::disk('user_avatars')->url($name);;
                    $user->save();
                }
                Notification::send(Admin::all(), new NewUserRegister($user));
                Notification::send($user, new WelcomeToUser($user));
                Auth::guard('web')->loginUsingId($user->id);
                return redirect(route('member.login'))->with('existUser', $user->id);
            }
            return redirect()->to('/member/dashboard');
        } catch (Exception $exception) {
            dd($exception);
        }
    }

//    public function redirectToProvider()
//    {
//        return Socialite::driver('google')->redirect();
//    }
//    public function redirectToProviderFacebook()
//    {
//        return Socialite::driver('facebook')->redirect();
//    }
//    public function handleProviderCallback()
//    {
//        try {
//            $googleUser = Socialite::driver('google')->user();
//
//            $existUser = User::where('email', $googleUser->email)->first();
//
//            if (!$existUser) {
//                $user = new User;
//                $user->name = $googleUser->name;
//                $user->email = $googleUser->email;
//                $user->password = Hash::make(Str::random(40));
//                $user->google_id = $googleUser->id;
//                $user->type = 6;
//                $user->reset_pass = 0;
//                $user->save();
//                return redirect('/member/login')->with('existUser', $user->id);
//            } else {
//                if ($existUser->type != 6) {
//                    Auth::loginUsingId($existUser->id);
//                    return redirect('/member/dashboard');
//                }
//                if ($existUser->phone == null) {
//                    return redirect('/member/login')->with('error', 'dataNull')->with('existUser', $existUser->id);
//                }
//                return redirect('/member/login')->with('error', 'wait');
//            }
//        } catch (Exception $e) {
//            dd($e);
//            return redirect()->to('/');
//        }
//    }

    public function handleProviderCallbackFacebook()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $existUser = User::where('email', $facebookUser->email)->first();
            if (!$existUser) {
                $user = new User;
                $user->name = $facebookUser->name;
                $user->email = $facebookUser->email;
                $user->password = Hash::make(Str::random(40));
                $user->facebook_id = $facebookUser->id;
                $user->type = 6;
                $user->reset_pass = 0;
                $user->save();
                return redirect('/')->with('existUser', $user->id);
            } else {
                if ($existUser->type != 6) {
                    Auth::loginUsingId($existUser->id);
                    return redirect('/dashboard');
                }
                if ($existUser->phone == null) {
                    return redirect('/')->with('error', 'dataNull')->with('existUser', $existUser->id);
                }
                return redirect('/')->with('error', 'wait');
            }
        } catch (Exception $e) {
            return redirect()->to('/');
        }
    }

    public function handelSocialData(Request $request)
    {
        $user = User::find($request->id);
        $user->email_contact = $request->email_contact;
        $user->phone = $request->phone;
        $user->save();
        return response()->json(
            [
                'data' => 'successful',
                'status' => 200
            ]
        );
    }

    public function loginEmail(Request $request)
    {
        $user = User::find($request->id);
        $isEqual = $request->slug == $user->slug;
        if ($isEqual) {
            Auth::loginUsingId($user->id);
            $user->slug = null;
            $user->save();
            return response()->json(
                [
                    'data' => 'successful',
                    'status' => 200
                ]
            );
        } else {
            return response()->json(array(
                'code' => 401,
            ), 401);
        }
        // return response()->json(
        //     [
        //         'data' =>  'successful',
        //         'status' => 200
        //     ]
        // );
    }
}