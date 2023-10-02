<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $totalUser            = User::select('id')->count();
        $totalRoom            = Room::select('id')->count();
        $totalPay             = PaymentHistory::select('id')->count();
        // $totalRechargeHistory = LichSuNapTien::select('id')->count();
        $users = User::orderByDesc('id')->limit(20)->get();
        $paymentHistory = PaymentHistory::orderByDesc('id')->limit(20)->get();
        // $rechargeHistory = LichSuNapTien::with('user:id,ten')->orderByDesc('id')->get();

        $viewData = [
            'totalUser'            => $totalUser,
            'totalRoom'            => $totalRoom,
            'totalPay'             => $totalPay,
            // 'totalRechargeHistory' => $totalRechargeHistory,
            'paymentHistory'       => $paymentHistory,
            'users'                => $users,
            // 'rechargeHistory'      => $rechargeHistory
        ];
        return view('admin.pages.dashboard.index',$viewData);
    }
}
