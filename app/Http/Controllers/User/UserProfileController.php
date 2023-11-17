<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdatePhoneRequest;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Models\Code;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
class UserProfileController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        return view('user.profile.index',compact('user'));
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar-'.$user->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar-'.$user->username.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$user->avatar))
               unlink('uploads/avatars/'.$user->avatar);

            $file->move('uploads/avatars',$Hinh);
            $user->avatar = $Hinh;
         }   
        //  dd($request->hasFile('avatar'));
        $user->name = $request->name;
        $user->email = $request->email;
        $user->facabook = $request->facebook;
        $user->save();
        return redirect()->route('get_user.profile.index');
    }

    public function updatePhone(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        return view('user.profile.updatephone',compact('user'));
    }

    public function processUpdate(UserUpdatePhoneRequest $request){
        $user = User::find(Auth::user()->id);

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
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $otp = rand(100000,999999);
        $time = time();
        $currentTime = now()->format('H:i d/m/Y'); 
        Code::updateorCreate(
            ['user_id' => $user->id],
            [
            'code' => $otp,
            'type' => 2,
            'status' => 1,
            'service' => 1,
            'created_at' => $time
            ]
        );
        $name='helllo';
        Mail::send('frontend.pages.email.updatephone',compact('user','otp','currentTime'),function($email) use ($user,$otp,$currentTime){
            $email->subject('Đổi số điện thoại');
            $email->to($user->email, $otp);
        });
        Toastr::success('Mã xác thực đã gửi tới email. Vui lòng nhập mã vào bên dưới để xác thực ', 'Thông báo');
      
        return redirect()->back();
       
    }

    public function updatePassword(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData =[
            'user' => $user,
        ];
        return view('user.profile.update_password',$viewData);
    }

    public function changeUpdate(UserUpdatePasswordRequest $request){
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->password, $user->password))
        {
            $user->password = bcrypt($request->password_new);
            Toastr::success('Đổi mật khẩu thành công', 'Thành công');
            $user->save();
            return redirect()->route('get_user.profile.index');
        }
        Toastr::error('Mật khẩu không chính xác', 'Thất bại');
        return redirect()->back();
       
    }


}
