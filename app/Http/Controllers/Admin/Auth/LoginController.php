<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLogin()
    {
        return $this->guard()->check() ? redirect('/admin') : view('admin.auth.login');
    }

//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//        $request->session()->invalidate();
//        return redirect()->route('admin.login');
//    }

    protected function sendLoginResponse(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return response()->json([
            'status'=>200,
            'message'=>'login successfully'
        ],200);
    }

//    public function login(Request $request)
//    {
//
//        $credential = [
//            'email' => $request->email,
//            'password' => $request->password
//        ];
//        if($this->guard()->attempt($credential)){
//            return response()->json([
//                'status'=>200,
//                'message'=>'login successfully'
//            ],200);
//        }
//        else{
//            return response()->json([
//                'status'=>422,
//                'message'=>'faild'
//            ],422);
//        }
//    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}