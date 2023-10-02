<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Auth;
class AdminPayController extends Controller
{
    public function deposit_history(){
        return view('admin.pages.pay.deposit_history');
    }
  
    public function  payment_history(){
        $paymentHistory = PaymentHistory::orderByDesc('id')->paginate(20);

    $viewData = [
        'paymentHistory' => $paymentHistory
    ];
        return view('admin.pages.pay.payment_history', $viewData);
    }

}
