<?php


namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (get_data_user('admins')) {
            return $next($request);
        }

        return redirect()->route('get_admin.login');
    }
}
