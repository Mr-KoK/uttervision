<?php

namespace App\Http\Middleware;

use App\Partner;
use Closure;
use \Cache;
use Illuminate\Support\Facades\Auth;

class AuthPartner
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
        if (Auth::guard('partner')->check()) {
            $expiresAt = now()->addMinutes(1);
            Cache::put('partner-is-online-' . Auth::guard('partner')->user()->id, true, $expiresAt);
            Partner::where('id', Auth::guard('partner')->user()->id)->update(['last_seen' => now()]);
            return $next($request);
        } else {
            return redirect()->route('partner.login');
        }
    }
}
