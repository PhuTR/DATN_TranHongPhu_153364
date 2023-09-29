<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPayController extends Controller
{
    public function index_pay(){
        return view('user.pay.index_pay');
    }

    public function deposit_history(){
        return view('user.pay.deposit_history');
    }

    public function Payment_history(){
        return view('user.pay.payment_history');
    }
}
