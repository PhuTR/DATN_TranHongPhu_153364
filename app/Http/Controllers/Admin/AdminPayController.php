<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class AdminPayController extends Controller
{
    public function deposit_history(){
        $depositHistory = RechargeHistory::orderByDesc('id')->paginate(20);

    $viewData = [
        'depositHistory' => $depositHistory
    ];
        return view('admin.pages.pay.deposit_history',$viewData);
    }
  
    public function  payment_history(){
        $paymentHistory = PaymentHistory::orderByDesc('id')->paginate(20);

    $viewData = [
        'paymentHistory' => $paymentHistory
    ];
        return view('admin.pages.pay.payment_history', $viewData);
    }


    public function create_transaction()
    {
        $users          = User::all();
        $rechargeConfig = config('payment.method');

        $viewData = [
            'users'          => $users,
            'rechargeConfig' => $rechargeConfig
        ];

        return view('admin.pages.pay.create_transaction', $viewData);
    }

    public function store_transaction(Request $request)
    {
        try {
            DB::beginTransaction();
            $data                = $request->except('_token');
            $data['created_at']  = Carbon::now();
            $data['total_money'] = $data['money'] + $data['discount'];
            $data['code']        = generateRandomString(15) . $data['user_id'];
   
            $rechargeHistory     = RechargeHistory::create($data);
          
            if ($rechargeHistory) {
                if ($rechargeHistory->status == RechargeHistory::STATUS_SUCCESS) {
                    // tiến hành cộng tiền cho người dùng
                    $user = User::find($rechargeHistory->user_id);
                    if (!$user) {
                        $rechargeHistory->note   = 'User không hợp lệ';
                        $rechargeHistory->status = RechargeHistory::STATUS_CANCEL;
                        $rechargeHistory->save();
                    } else {
                        Log::info("--- cộng tiền");
                        $user->	account_balance += $rechargeHistory->total_money;
                        $user->save();
                    }
                }
            }

            DB::commit();
            return redirect()->route('get_admin.pay.deposit_history');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }


    public function edit_transaction($id)
    {
        $rechargeHistory = RechargeHistory::find($id);
        if ($rechargeHistory->status == RechargeHistory::STATUS_SUCCESS) {
            return redirect()->back();
        }

        $rechargeConfig  = config('payment.method');

        $viewData = [
            'rechargeHistory' => $rechargeHistory,
            'rechargeConfig'  => $rechargeConfig
        ];

        return view('admin.pages.pay.update_transaction', $viewData);
    }

    public function update_transaction($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $rechargeHistory = RechargeHistory::find($id);
           
            $rechargeHistory->total_money = $request->money + $request->discount;
            $rechargeHistory->updated_at = Carbon::now();
            $rechargeHistory->user_id = $request->user_id;
            $rechargeHistory->type = $request->type;
            $rechargeHistory->status = $request->status;
            $rechargeHistory->save();
            if ($rechargeHistory) {
                if ($rechargeHistory->status == RechargeHistory::STATUS_SUCCESS) {
                    // tiến hành cộng tiền cho người dùng
                    $user = User::find($rechargeHistory->user_id);
                    if (!$user) {
                        $rechargeHistory->note   = 'User không hợp lệ';
                        $rechargeHistory->status = RechargeHistory::STATUS_CANCEL;
                        $rechargeHistory->save();
                    } else {
                        Log::info("--- cộng tiền");
                        $user->account_balance += $rechargeHistory->total_money;
                        $user->save();
                    }
                }
            }

            DB::commit();
            return redirect()->route('get_admin.pay.deposit_history');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

}
