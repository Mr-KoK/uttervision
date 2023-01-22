<?php

namespace App\Http\Controllers\Users\Auth;

use App\Admin;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Notifications\WelcomeToUser;
use App\Services\ResponseService;
use App\Services\UserService;
use App\User;
use Exception;
use App\Enum\Enums;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Bus\Queueable;
use App\Notifications\NewUserRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use function bcrypt;
use function str_random;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use Queueable;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return string
     */
    public function create(Request $request) :JsonResponse
    {
        try {
            $this->validator((array)$request);
            $user = User::where('email', '=', $request['email'])->first();
            if ($user === null) {
                $user = UserService::createNewUser($request['email'],$request['password']);
                $this->guard()->login($user);
                $user->sendVerifyEmail();
                Notification::send(Admin::all(), new NewUserRegister($user));
                Notification::send($user, new WelcomeToUser($user));
                return ResponseService::jsonRes(true, $user, 'user create successfully!', '', 200);
            } else {
                return ResponseService::jsonRes(false, '', 'user is exist!', '', 409);
            }
        } catch (Exception $exception) {
            return ResponseService::jsonRes(false, '', $exception, '', 500);
        }
    }
}
