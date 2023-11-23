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
        $listMonth = getListMonthsInYear();
    
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
        $listDay = getListDayInMonth();
        $get = RechargeHistory::where('status',2)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at', 'ASC')
            ->where('type',3)
            ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
            ->groupBy('day')
            ->get();
        $get1 = RechargeHistory::where('status',2)
            ->whereBetween('created_at',[$from_date,$to_date])
            ->orderBy('created_at', 'ASC')
            ->where('type',2)
            ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
            ->groupBy('day')
            ->get();
        $chart_data = [];
        $listDay = getListDayInMonth();
        foreach ($listDay as $day){
            $total = 0;
            foreach($get as $key=>$val){
                if($val['day'] == $day){
                    $total = $val['total_money_per_day'];
                    break;
                }
                
            }

            $total1 = 0;
            foreach($get1 as $key=>$val){
                if($val['day'] == $day){
                    $total1 = $val['total_money_per_day'];
                    break;
                }
                
            }

             $chart_data[] = array(
                    'period' => $day,
                    'a' => $total,
                    'b' => $total1
                ); 
        }
        
         echo $data = json_encode($chart_data);

    }

    public function days_order(Request $request){
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $vnpay = RechargeHistory::where('status', 2)
            ->whereBetween('created_at',[$sub30days,$now])
            ->orderBy('created_at', 'ASC')
            ->where('type',3)
            ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
            ->groupBy('day')
            ->get();

        $momo = RechargeHistory::where('status', 2)
            ->whereBetween('created_at',[$sub30days,$now])
            ->orderBy('created_at', 'ASC')
            ->where('type',4)
            ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
            ->groupBy('day')
            ->get();

        $tienmat = RechargeHistory::where('status', 2)
            ->whereBetween('created_at',[$sub30days,$now])
            ->orderBy('created_at', 'ASC')
            ->where('type',2)
            ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
            ->groupBy('day')
            ->get();
        $chart_data = [];
        $listDay = getListDayInMonth();
        foreach ($listDay as $day){
            $total = 0;
            foreach($vnpay as $key=>$val){
                if($val['day'] == $day){
                    $total = $val['total_money_per_day'];
                    break;
                }
                
            }

            $total1 = 0;
        foreach($tienmat as $key=>$val){
                if($val['day'] == $day){
                    $total1 = $val['total_money_per_day'];
                    break;
                }
                
            }
            $total2 = 0;
        foreach($momo as $key=>$val){
                if($val['day'] == $day){
                    $total2 = $val['total_money_per_day'];
                    break;
                }
                
            }

             $chart_data[] = array(
                    'period' => $day,
                    'a' => $total,
                    'b' => $total1,
                    'c' => $total2
                ); 
        }
        
         echo $data = json_encode($chart_data);
    }
     
    public function dashboard_filter(Request $request){
        $data = $request->all();
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $cuoithangnay = Carbon::now('Asia/Ho_Chi_Minh')->endOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subday(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subday(365)->toDateString();

        $sub12months = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(12)->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh');
        if($data['dashboard_value']=='ngay'){
            $vnpay = RechargeHistory::where('status', 2)
                ->whereBetween('created_at',[$sub30days,$now])
                ->orderBy('created_at', 'ASC')
                ->where('type',3)
                ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
                ->groupBy('day')
                ->get();

            $momo = RechargeHistory::where('status', 2)
                ->whereBetween('created_at',[$sub30days,$now])
                ->orderBy('created_at', 'ASC')
                ->where('type',4)
                ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
                ->groupBy('day')
                ->get();

            $tienmat = RechargeHistory::where('status', 2)
                ->whereBetween('created_at',[$sub30days,$now])
                ->orderBy('created_at', 'ASC')
                ->where('type',2)
                ->selectRaw('DATE(created_at) as day, SUM(total_money) as total_money_per_day')
                ->groupBy('day')
                ->get();
            $chart_data = [];
            $listDay = getListDayInMonth();
            foreach ($listDay as $day){
                $total = 0;
                foreach($vnpay as $key=>$val){
                    if($val['day'] == $day){
                        $total = $val['total_money_per_day'];
                        break;
                    }
                    
                }

                $total1 = 0;
            foreach($tienmat as $key=>$val){
                    if($val['day'] == $day){
                        $total1 = $val['total_money_per_day'];
                        break;
                    }
                    
                }
                $total2 = 0;
            foreach($momo as $key=>$val){
                    if($val['day'] == $day){
                        $total2 = $val['total_money_per_day'];
                        break;
                    }
                    
                }

                $chart_data[] = array(
                        'period' => $day,
                        'a' => $total,
                        'b' => $total1,
                        'c' => $total2
                    ); 
            }
            
            echo $data = json_encode($chart_data);
        }
        elseif($data['dashboard_value']=='thang'){
            $vnpay = RechargeHistory::where('status',2)
                ->whereBetween('created_at',[$sub12months,$now])
                ->where('type',3)
                ->orderBy('created_at', 'ASC')
                ->selectRaw('MONTH(created_at) as month, SUM(total_money) as total_money_per_day')
                ->groupBy('month')
                ->get();
            
            $tienmat = RechargeHistory::where('status',2)
                ->whereBetween('created_at',[$sub12months,$now])
                ->orderBy('created_at', 'ASC')
                ->where('type',2)
                ->selectRaw('MONTH(created_at) as month, SUM(total_money) as total_money_per_day')
                ->groupBy('month')
                ->get();
                
            $momo = RechargeHistory::where('status',2)
                ->whereBetween('created_at',[$sub12months,$now])
                ->orderBy('created_at', 'ASC')
                ->where('type',4)
                ->selectRaw('MONTH(created_at) as month, SUM(total_money) as total_money_per_day')
                ->groupBy('month')
                ->get();
            
                $chart_data = [];
                $listMonth = getListMonthsInYear();
                foreach ($listMonth as $month){
                    $total = 0;
                    foreach($vnpay as $key=>$val){
                        if($val['month'] == $month){
                            $total = $val['total_money_per_day'];
                            break;
                        }
                        
                    }
        
                    $total1 = 0;
                    foreach($tienmat as $key=>$val){
                        if($val['month'] == $month){
                            $total1 = $val['total_money_per_day'];
                            break;
                        }
                        
                    }

                    $total2 = 0;
                    foreach($momo as $key=>$val){
                        if($val['month'] == $month){
                            $total2 = $val['total_money_per_day'];
                            break;
                        }
                        
                    }
        
                     $chart_data[] = array(
                            'period' => $month,
                            'a' => $total,
                            'b' => $total1,
                            'c' => $total2,
                        ); 
                }
                
                 echo $data = json_encode($chart_data);

        
        }

    }
    
}
