<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;
use \Cache;
use Carbon\Carbon;



class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        $date = Auth::guard('admin')->user()->role;
//        dd($date);
//        dd(Carbon::parse($date)->format('l h:m:s j F Y'));

        if (Auth::guard('admin')->check()) {
            $expiresAt = now()->addMinutes(1);
            Cache::put('admin-is-online-' . Auth::guard('admin')->user()->id, true, $expiresAt);
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['last_seen' => now()]);
            return $next($request);
        } else {
            return redirect()->route('admin.login');
        }
    }
}