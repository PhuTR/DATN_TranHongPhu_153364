<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdatePasswordRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
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
        //  dd($request->hasFile('avatar'));
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

    

  
    

}
