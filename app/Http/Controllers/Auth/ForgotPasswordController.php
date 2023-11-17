<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserForgotEmailRequest;
use App\Http\Requests\UserForgotPasswordRequest;
use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
class ForgotPasswordController extends Controller
{
    public function index(){
        return view('auth.forgot_password');
    }
    public function forgotpassword(UserForgotEmailRequest $request){
        $token = strtoupper(Str::random(10));
        $user = User::where('email',$request->email)->first();
        $user->update(['remember_token'=>$token]);
        $currentTime = now()->format('H:i d/m/Y'); 
        Mail::send('frontend.pages.email.forgotpassword',compact('user','currentTime'),function($email) use ($user,$currentTime){
            $email->subject('Lấy lại mật khẩu tài khoản');
            $email->to($user->email, $user->name);
        });
        Toastr::success('Mã xác thực đã gửi tới email. Vui lòng nhập mã vào bên dưới để xác thực ', 'Thông báo');
        return redirect()->route('get.login');
    }
   
    public function newpassword(User $user,$token){
        if($user->remember_token == $token){
            return view('auth.new_password');
        }
        return abort(404);
    }

    public function newpasswordpost(User $user,$token,UserForgotPasswordRequest $request){
        $data = $request->all();
        $password_h = bcrypt($request->password_new);
        $user->update(['password' => $password_h,'remember_token' => null]);
        Toastr::success('Đã thay đổi mật khẩu thành công. Vui lòng đăng nhập lại', 'Thông báo');
        return redirect()->route('get.login'); 
    }
}
