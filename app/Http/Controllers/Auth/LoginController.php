<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function login(Request $request){


        $data = $request->except('_token');
        if(Auth::attempt($data)){
            Toastr::success('Đăng nhập thành công', 'Thông báo');
            return redirect()->to('/');
        }else{
            Toastr::warning('Vui lòng kiểm tra lại tài khoản hoặc mật khẩu', 'Thông báo');
            return redirect()->back();
        }
        

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Toastr::success('Đăng xuất thành công', 'Thành công');
        return redirect('/');

    }
}
