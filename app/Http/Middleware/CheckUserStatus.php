<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status == User::STATUS_ACTIVE) {
            return $next($request);
        }
        return redirect()->route('get.home.lockaccount');
    }
}
