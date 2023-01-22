<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Users;
use Illuminate\Support\Carbon;


class AccountsController extends Controller
{
    public function formResetPassword(Request $request)
    {
        return view('member.auth.passwords.reset', [
            'token' => $request->token,
            'email' => $request->email
        ]);
    }

    public function validatePasswordRequest(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required']);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }
        $password = $request->password;
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
        if (!$tokenData) return view('member.auth.passwords.email');
        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        $user->password = Hash::make($password);
        $user->save();
        Auth::login($user);
        DB::table('password_resets')->where('email', $user->email)
            ->delete();
        return view('member.auth.passwords.success');
    }

    private function sendResetEmail($email, $token): bool
    {
        $user = DB::table('users')->where('email', $email)->select('id', 'email')->first();
        $link = URL::to('/') . '/member/password/reset?token=' . $token . '&email=' . urlencode($user->email);
        try {
            Mail::to($user->email)->queue(new ResetPassword($user->id, $link));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


}