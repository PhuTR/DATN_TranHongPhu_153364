<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPayController extends Controller
{
    public function index_pay(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData = [
            'user' => $user,
        ];
        return view('user.pay.index_pay',$viewData);
    }

    public function deposit_history(){
        return view('user.pay.deposit_history');
    }

    public function cash(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData = [
            'user' => $user,
        ];
        return view('user.pay.method_pay.cash',$viewData);
    }
    public function atm(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData = [
            'user' => $user,
        ];
        return view('user.pay.method_pay.atm',$viewData);
    }
    public function transfer_money(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData = [
            'user' => $user,
        ];
        return view('user.pay.method_pay.transfer_money',$viewData);
    }
    public function zalopay(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $viewData = [
            'user' => $user,
        ];
        return view('user.pay.method_pay.zalo_pay',$viewData);
    }
}
