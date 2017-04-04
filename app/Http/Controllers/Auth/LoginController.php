<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller {
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
    protected $username ='User_Email';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dangnhap() {
        if (Auth::check()) {
            return redirect()->intended('admin/product/product_list');
        } else {
            return view('layouts.admin.login');
        }
    }
    
    public function postdangnhap(Request $request) {
        
        if (Auth::attempt(['User_Email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('admin/product/product_list');
        } else {
            return redirect('admin/login')->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    public function dangxuat() {
        Auth::logout();
        return redirect('admin/login');
    }

}
