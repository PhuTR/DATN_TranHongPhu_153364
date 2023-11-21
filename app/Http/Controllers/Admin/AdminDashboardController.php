<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AdminDashboardController extends Controller
{
    public function index(){
        $totalUser            = User::select('id')->count();
        $totalRoom            = Room::select('id')->count();
        $totalPay             = PaymentHistory::select('id')->count();
        $totalRechargeHistory = RechargeHistory::select('id')->count();
        $users = User::orderByDesc('id')->limit(20)->get();
        $paymentHistory = PaymentHistory::orderByDesc('id')->limit(20)->get();
        $rechargeHistory = RechargeHistory::with('user:id,name')->orderByDesc('id')->where('status',2)->get();

        $viewData = [
            'totalUser'            => $totalUser,
            'totalRoom'            => $totalRoom,
            'totalPay'             => $totalPay,
            'totalRechargeHistory' => $totalRechargeHistory,
            'paymentHistory'       => $paymentHistory,
            'users'                => $users,
            'rechargeHistory'      => $rechargeHistory
        ];
        return view('admin.pages.dashboard.index',$viewData);
    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = RechargeHistory::where('status',2)->whereBetween('created_at',[$from_date,$to_date])->orderBy('money','ASC')->get();
        foreach($get as $key=>$val){
            $chart_data[] = array(
                'period' => $val->created_at->format('d-m-Y'),
                'a'=> $val->total_money

            );
        }
        echo $data = json_encode($chart_data);

    }

    public function days_order(Request $request){
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = RechargeHistory::where('status',2)->get();
        foreach($get as $key=>$val){
            $chart_data[] = array(
                'period' => $val->created_at->format('d-m-Y'),
                'a'=> $val->total_money

            );
        }
        echo $data = json_encode($chart_data);
    }
     
    public function dashboard_filter(Request $request){
        $data = $request->all();
       
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subday(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subday(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get = RechargeHistory::where('status',2)->whereBetween('created_at',[$sub7days,$now])->orderBy('money','ASC')->get();
        
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get = RechargeHistory::where('status',2)->whereBetween('created_at',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('money','ASC')->get();
        
        }elseif($data['dashboard_value']=='thangnay'){
            $get = RechargeHistory::where('status',2)->whereBetween('created_at',[$dauthangnay,$now])->orderBy('money','ASC')->get();
        
        }elseif($data['dashboard_value']=='365ngayqua'){
            $get = RechargeHistory::where('status',2)->whereBetween('created_at',[$sub365days,$now])->orderBy('money','ASC')->get();
        
        }

        foreach($get as $key=>$val){
            $chart_data[] = array(
                'period' => $val->created_at->format('d-m-Y'),
                'a'=> $val->total_money

            );
        }
        echo $data = json_encode($chart_data);

    }
    
}
