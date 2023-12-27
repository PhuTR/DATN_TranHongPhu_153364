<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use App\Models\RechargeHistory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
class UserPayController extends Controller
{
    public function index_pay(){
        $user = User::find(Auth::user()->id);
        if(!$user) return abort(404);
        $recharge = config('payment.method');
        $viewData = [
            'user' => $user,
            'recharge' => $recharge
        ];
        return view('user.pay.index_pay',$viewData);
    }

    public function switchRecharge($slug, $code, Request $request)
    {
        switch ($code) {
            case 1:
                $user = User::find(Auth::user()->id);
                if(!$user) return abort(404);
                $viewData = [
                    'user' => $user,
                ];
                return view('user.pay.method_pay.transfer_money',$viewData);
            case 2;
                $user = User::find(Auth::user()->id);
                if(!$user) return abort(404);
                $viewData = [
                    'user' => $user,
                ];
                return view('user.pay.method_pay.cash',$viewData);
            case 3;
                return redirect()->route('get_user.recharge.atm');
            case 4;
                return redirect()->route('get_user.recharge.momo');
        }
    }

    public function deposit_history(){
        $depositHistory = RechargeHistory::where('user_id', Auth::user()->id)
        ->orderByDesc('id')->get();

        $viewData = [
            'depositHistory' => $depositHistory
        ];
            return view('user.pay.deposit_history',$viewData);
    }
  
    public function  payment_history(){
        $paymentHistory = PaymentHistory::where('user_id', Auth::user()->id)
        ->orderByDesc('id')->get();

        $viewData = [
            'paymentHistory' => $paymentHistory
        ];
        return view('user.pay.payment_history', $viewData);
    }
    public function atmInternet(Request $request)
    {
        return view('user.pay.method_pay.atm');
    }
    public function momoPayment(Request $request)
    {
        return view('user.pay.method_pay.momo');
    }
    

//thanh toán vnpay
    public function processAtmInternet(Request $request)
    {
        try {
            $data                = $request->except('_token');
            $data['created_at']  = Carbon::now();
            $data['money']       = $request->gia;
            $data['user_id']     = get_data_user('web');
            $data['total_money'] = $data['money'];
            $data['type']        = 3;
            $data['code']        = generateRandomString(15) . $data['user_id'];
            $rechargeHistory     = RechargeHistory::create($data);
            $this->createPaymentAtm($rechargeHistory);
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
        }

        return redirect()->back();
    }

    protected function createPaymentAtm($rechargeHistory)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TmnCode = "QL0RJ7CB"; //Website ID in VNPAY System
        $vnp_HashSecret = "ORUWZKZADXGLHUDFWUGYTIBQVDPRTMAZ"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/user/nap-tien/post-back-atm-internet-banking";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

        $vnp_TxnRef = $rechargeHistory->code;
        $vnp_OrderInfo = 'Nạp tiền';
        $vnp_OrderType = 'other';
        $vnp_Amount = $rechargeHistory->total_money * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //        $vnp_ExpireDate = $_POST['txtexpire'];
        $vnp_Bill_Mobile = get_data_user('web', 'phone');
        $vnp_Bill_Email = get_data_user('web', 'email');
        $fullName = get_data_user('web', 'name');
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }

        $vnp_Bill_Country = 'VN';

        $vnp_Inv_Phone = $vnp_Bill_Mobile;
        $vnp_Inv_Email = $vnp_Bill_Email;
        $vnp_Inv_Customer = 'Võ Thành Tiến';
        $vnp_Inv_Address = 'Đà Nẵng';
        $vnp_Inv_Taxcode = '0102182292';
        $vnp_Inv_Type = 'I';
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        header('Location: ' . $vnp_Url);
        die();
    }

    public function postbackAtm(Request $request)
    {
        try {
            DB::beginTransaction();
            $code = $request->vnp_TxnRef;
            $rechargeHistory     = RechargeHistory::where('code', $code)->first();
            
            if (!$rechargeHistory) {
                return redirect()->route('get_user.recharge.atm');
            }
            $statusCode = $request->vnp_TransactionStatus;
          
            if ($statusCode == '00') {
                // tiến hành cộng tiền
                // Tiếp hành update code
                $rechargeHistory->status = RechargeHistory::STATUS_SUCCESS;
                $rechargeHistory->save();
                    $user = User::find($rechargeHistory->user_id);
                if (!$user) {
                    $rechargeHistory->note   = 'User không hợp lệ';
                    $rechargeHistory->status = RechargeHistory::STATUS_CANCEL;
                    $rechargeHistory->save();
                    DB::commit();
                    // show thông báo
                    return redirect()->route('get_user.recharge.atm');
                } else {
                    Log::info("--- cộng tiền");
                    $user->account_balance += $rechargeHistory->total_money;
                    $user->save();
                    Toastr::success('Nạp tiền thành công', 'Thành công');
                }
                DB::commit();
                return  redirect()->route('get_user.pay.index_pay');
					}
       
            switch ($statusCode) {
                case "01":
                    $message = "Giao dịch chưa hoàn tất";
                    break;
                case "02":
                    $message = "Giao dịch bị lỗi";
                    break;
                case "04":
                    $message = "VGiao dịch đảo (Khách hàng đã bị trừ tiền tại Ngân hàng nhưng GD chưa thành công ở VNPAY)";
                    break;
                case "05":
                    $message = "VNPAY đang xử lý giao dịch này (GD hoàn tiền)";
                    break;
                case "06":
                    $message = "VNPAY đã gửi yêu cầu hoàn tiền sang Ngân hàng (GD hoàn tiền)";
                    break;
                case "07":
                    $message = "Giao dịch bị nghi ngờ gian lận";
                    break;
                case "09":
                    $message = "GD Hoàn trả bị từ chối";
                    break;
            }

            $rechargeHistory->status = RechargeHistory::STATUS_ERROR;
            $rechargeHistory->note = $message;
            $rechargeHistory->save();
            // show thông báo
            DB::commit();
            return redirect()->route('get_user.pay.index_pay');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("------------ postbackAtm" . $exception->getMessage());
            return redirect()->route('get_user.recharge.atm');
        }
    }

//thanh toán momo
    public function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
    }

    public function processMomo(Request $request){
        try {
            $data                = $request->except('_token');
            $data['created_at']  = Carbon::now();
            $data['money']       = $request->gia;
            $data['user_id']     = get_data_user('web');
            $data['total_money'] = $data['money'];
            $data['type']        = 4;
            $data['code']        = generateRandomString(15) . $data['user_id'];
           
            $rechargeHistory     = RechargeHistory::create($data);
            $this->createPaymentMomo($rechargeHistory);
        } catch (\Exception $exception) {
            Log::error("---------------------  " . $exception->getMessage());
        }

        return redirect()->back();
    }
    
    public function createPaymentMomo($rechargeHistory){
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $rechargeHistory->total_money;
        $orderId = $rechargeHistory->code;
        $redirectUrl = "http://127.0.0.1:8000/user/nap-tien/post-back-momo";
        $ipnUrl = "http://127.0.0.1:8000/user/nap-tien";
        $extraData = "";


        if (!empty($_POST)) {
            $partnerCode = $partnerCode;
            $accessKey = $accessKey;
            $serectkey = $secretKey;
            $orderId = $orderId; // Mã đơn hàng
            $orderInfo = $orderInfo;
            $amount = $amount;
            $ipnUrl = $ipnUrl;
            $redirectUrl = $redirectUrl;
            $extraData = $extraData;

            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
           
            $jsonResult = json_decode($result, true);  // decode json
            header('Location: ' . $jsonResult['payUrl']);
            exit;
        }
    }
    public function postbackMomo(Request $request){
        try {
            // DB::beginTransaction();
            $code = $request->orderId;
            $rechargeHistory     = RechargeHistory::where('code', $code)->first();
            
            if (!$rechargeHistory) {
                return redirect()->route('get_user.recharge.atm');
            }

            // if ($statusCode == '00') {
                // tiến hành cộng tiền
                // Tiếp hành update code
                $rechargeHistory->status = RechargeHistory::STATUS_SUCCESS;
                $rechargeHistory->save();
                
                $user = User::find($rechargeHistory->user_id);
           
                if (!$user) {
                    $rechargeHistory->note   = 'User không hợp lệ';
                    $rechargeHistory->status = RechargeHistory::STATUS_CANCEL;
                    $rechargeHistory->save();
                    DB::commit();
                    return redirect()->route('get_user.recharge.atm');
                } else {
                    Log::info("--- cộng tiền");
                    $user->account_balance += $rechargeHistory->total_money;
                    // dd($user->account_balance);
                    $user->save();
                    Toastr::success('Nạp tiền thành công', 'Thành công');
                }
                DB::commit();
                return  redirect()->route('get_user.pay.index_pay');
            // }
       
            // switch ($statusCode) {
            //     case "01":
            //         $message = "Giao dịch chưa hoàn tất";
            //         break;
            //     case "02":
            //         $message = "Giao dịch bị lỗi";
            //         break;
            //     case "04":
            //         $message = "VGiao dịch đảo (Khách hàng đã bị trừ tiền tại Ngân hàng nhưng GD chưa thành công ở VNPAY)";
            //         break;
            //     case "05":
            //         $message = "VNPAY đang xử lý giao dịch này (GD hoàn tiền)";
            //         break;
            //     case "06":
            //         $message = "VNPAY đã gửi yêu cầu hoàn tiền sang Ngân hàng (GD hoàn tiền)";
            //         break;
            //     case "07":
            //         $message = "Giao dịch bị nghi ngờ gian lận";
            //         break;
            //     case "09":
            //         $message = "GD Hoàn trả bị từ chối";
            //         break;
            // }

            // $rechargeHistory->status = RechargeHistory::STATUS_ERROR;
            // $rechargeHistory->note = $message;
            // $rechargeHistory->save();
            // show thông báo
            // DB::commit();
            // return redirect()->route('get_user.pay.index_pay');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("------------ postbackAtm" . $exception->getMessage());
            return redirect()->route('get_user.recharge.atm');
        }
    }
}