<?php

namespace App\Http\Controllers\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $data = $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = Carbon::now();
        $data['remember_token'] = $request->_token;
        $user = User::create($data);
        if($user)
        {
            Auth::login($user);
            if(Auth::check()){
                return redirect()->route('get.home');
            }
            return redirect()->back();
        }

    }

}
