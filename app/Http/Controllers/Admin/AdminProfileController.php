<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdatePasswordRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Code;
use Illuminate\Support\Facades\Auth;
// use Biran2694\Toast\Facades\Toastr;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        $admin = Admin::find(Auth::guard('admins')->id());

        if(!$admin) return abort(404);
        $viewData = [
            'admin' => $admin,
        ];

        return view('admin.pages.profile.index',$viewData);
    }


    public function update(Request $request){
        $admin = Admin::find(Auth::guard('admins')->user()->id);
        if(!$admin) return abort(404);
        
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar-'.$admin->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar-'.$admin->username.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$admin->avatar))
               unlink('uploads/avatars/'.$admin->avatar);

            $file->move('uploads/avatars',$Hinh);
            $admin->avatar = $Hinh;
         }   
        
      
        $admin->name = $request->name;
        $admin->email = $request->email;
        // $admin->facabook = $request->facebook;
        $admin->save();
        return redirect()->route('get_admin.profile.index');
    }

    public function updatePassword(){
        $admin = Admin::find(Auth::guard('admins')->user()->id);
        if(!$admin) return abort(404);
        $viewData =[
            'admin' => $admin,
        ];
        return view('admin.pages.profile.update_password',$viewData);
    }

    public function changeUpdate(AdminUpdatePasswordRequest $request){
        $admin = Admin::find(Auth::guard('admins')->user()->id);
        if(Hash::check($request->password, $admin->password))
        {
            $admin->password = bcrypt($request->password_new);
            Toastr::success('Đổi mật khẩu thành công', 'Thành công');
            $admin->save();
            return redirect()->route('get_admin.admin.dashbord');
        }
        Toastr::error('Mật khẩu không chính xác', 'Thất bại');
        return redirect()->back();
       
    }

    public function updatePhone(){
        $admin = Admin::find(Auth::guard('admins')->user()->id);
        if(!$admin) return abort(404);
        return view('admin.pages.profile.updatephone',compact('admin'));
    }

    public function processUpdate(Request $request){
        $user = Admin::find(Auth::user()->id);

        $inputCode = $request->input('code');
        $codeRecord = Code::where('code', $inputCode)->first();
     
        if ($codeRecord) {
            $user->phone = $request->phone_new;
            $user->save();
            Toastr::success('Đổi số điện thoại thành công', 'Thất bại');
            return redirect()->route('get_user.profile.index');
        } else {
         
            Toastr::error('Mật khẩu không chính xác', 'Thất bại');
        }
        
    }


    public function sendcode(Request $request){
        $user = Admin::find(Auth::user()->id);
        if(!$user) return abort(404);
        $otp = rand(100000,999999);
        $time = time();

        Code::updateorCreate(
            ['user_id' => $user->id],
            [
            'code' => $otp,
            'created_at' => $time
            ]
        );
        // Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
        //     $message->to($user->email)
        //             ->subject('Mã OTP của bạn');
        // });
      
        return redirect()->back();
       
    }

    

  
    

}
