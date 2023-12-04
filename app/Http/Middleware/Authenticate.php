<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() && $request->routeIs('get_admin.*')) {
            return route('get_admin.login'); // Đổi 'admin.login' thành tên tuyến đăng nhập cho guard 'admins'
        }

        return route('login');
    }
}
