<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class LoginAdminController extends Controller
{
    public function index(){
        return view('admin.auth.login');
    }

    public function login(Request $request){


        if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('get_admin.admin.dashbord');
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with('error', 'Đăng nhập không thành công.');
        }


        

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Toastr::success('Đăng xuất thành công', 'Thành công');
        return redirect('admin');

    }
}
