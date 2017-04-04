<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLogin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->User_RootAdmin == 1) {
                return $next($request);
            } else {
                return redirect('admin/product/product_list');
            }
        } else {
            return redirect('admin/login');
        }
    }

}
