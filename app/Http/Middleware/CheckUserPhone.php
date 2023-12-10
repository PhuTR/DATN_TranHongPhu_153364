<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class CheckUserPhone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        if (auth()->check() && (auth()->user()->phone != NULL)) {
            return $next($request);
        }
        Toastr::warning('Cần thêm số điện thoại', 'Thông báo');
        return redirect()->route('get_user.profile.create_phone');
    }
}
