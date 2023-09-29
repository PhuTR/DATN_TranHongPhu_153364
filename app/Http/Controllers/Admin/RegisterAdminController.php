<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class RegisterAdminController extends Controller
{
    public function index(){
        return view('admin.auth.register');
    }
    

    public function register(Request $request){
        

        $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = Carbon::now();

   
        $admin = Admin::create($data);


        // $user = User::create($data);
        if($admin)
        {
            Auth::guard('admin')->login($admin);
            if(Auth::guard('admin')->check()){
                Toastr::success('Đăng ký thành công', 'Thành công');
                return redirect()->route('get_admin.admin.dashbord');
            }
            return redirect()->back();
        }

    }
}
