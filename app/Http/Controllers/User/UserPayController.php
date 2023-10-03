<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
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
        $depositHistory = RechargeHistory::where('user_id', Auth::user()->id)
        ->orderByDesc('id')->paginate(20);

    $viewData = [
        'depositHistory' => $depositHistory
    ];
        return view('user.pay.deposit_history',$viewData);
    }
  
    public function  payment_history(){
        $paymentHistory = PaymentHistory::where('user_id', Auth::user()->id)
        ->orderByDesc('id')->paginate(20);

    $viewData = [
        'paymentHistory' => $paymentHistory
    ];
        return view('user.pay.payment_history', $viewData);
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
