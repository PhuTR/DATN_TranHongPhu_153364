<?php

namespace App\Http\Controllers\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoomRequest;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\Category;
use App\Models\Room;
use App\Models\Option;
use App\Models\PaymentHistory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserRoomController extends Controller
{
   
    public function index(Request $request){
        // $this->checkTimeRoom();
        $rooms = Room::with('category:id,name')->where("auth_id", Auth::user()->id)->orderByDesc("id")->get();
        $viewData = [
            'rooms' => $rooms,
        ];
        return view('user.room.index',$viewData);
    }
    public function checkTimeRoom(){
        $today         = Date::today()->format('Y-m-d');
        $checkTimeRoom = Room::whereDate('time_stop', '<=', $today)->get();
        if ($checkTimeRoom->isNotEmpty()) {
            dd($checkTimeRoom);
        } else {
            dd('Không có phòng nào có thời gian dừng nhỏ hơn hoặc bằng ngày hiện tại.');
        }
            
    }
    public function create(Request $request){
        $citys = City::select('code','name')->where('type',1)->get();
        $districts = District::select('code','name')->where('type',2)->get();
        $wards = Ward::select('code','name')->where('type',3)->get();

        $categories = Category::select('id','name')->get();
        $optisons = Option::select('id','name')->get();
        $viewData = [
            'citys' => $citys,
            'districts' => $districts,
            'wards' => $wards,
            'optisons' => $optisons,
            'categories' => $categories,
        ];
        return view('user.room.create',$viewData);
    }

    public function store(UserRoomRequest $request){

        $data = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $data['auth_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        $data['status']     = Room::STATUS_EXPIRED;
        $data = $this->switchPrice($data);
        $data = $this->switchArea($data);

        $arrlatlng = array();
        $arrlatlng[] = $request->txtlat;
        $arrlatlng[] = $request->txtlng;
        $json_latlng = json_encode($arrlatlng,JSON_FORCE_OBJECT);
        $data['map'] = $json_latlng;
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $data['avatar'] = $file['name'];
            }
        }
        
        $room = Room::create($data);
        if($room){
            if($request->file){
                $this->syncAlbumImageAndProduct($request->file, $room->id);
            }
            return redirect()->route('get_user.room.home');
        }else{
           return redirect()->back();
        }
    }

    public function edit($id,Request $request){


        $room = Room::where(['id' => $id,'auth_id' => Auth::user()->id])->first();

        if(!$room) return abort(404);
        $citys = City::select('id','code','name')->where('type',1)->get();
        $districts = District::select('id','code','name')->where('type',2)->get();
        $wards = Ward::select('id','code','name')->where('type',3)->get();
        $categories = Category::select('id','name')->get();
        $optisons = Option::select('id','name')->get();
        $images     = DB::table('images')->where("room_id", $id)->get();
        $viewData = [
            'citys' => $citys,
            'districts' => $districts,
            'wards' => $wards,
            'categories' => $categories,
            'optisons' => $optisons,
            'room' => $room,
            'images' => $images,
            
        ];

        return view ('user.room.update', $viewData);
    }

    public function update($id,Request $request){
        
        $data = $request->except('_token','avatar','file','txtlat','txtlng','txtaddress');
        $data['updated_at'] = Carbon::now();
        $data['price'] = str_replace('.', '', $request->price);
        $data['slug'] = Str::slug($request->name);
        $data = $this->switchPrice($data);
        $data = $this->switchArea($data);
        
        if ($request->avatar) {
            $file = upload_image('avatar');
            if (isset($file) && $file['code'] == 1) {
                $data['avatar'] = $file['name'];
            }
        }
        $arrlatlng = array();
        $arrlatlng[] = $request->txtlat;
        $arrlatlng[] = $request->txtlng;
        $json_latlng = json_encode($arrlatlng,JSON_FORCE_OBJECT);
        $data['map'] = $json_latlng;
        // dd($data);
        $room = Room::where(['id' => $id,'auth_id' => Auth::user()->id])->update($data);
        if($room){
            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
            return redirect()->route('get_user.room.home');
        }else{
           return redirect()->back();
        }
    }
   
    



    public function loadDistrict(Request $request){
        if($request->ajax()){
            $city = $request->city_code;
            $location = District::where('city_code', $city)->select('code','name','slug')->get();
            return response()->json($location);
        }

    }

    public function loadWards(Request $request){
        if($request->ajax()){
            $district_id = $request->district_code;
            $location = Ward::where('district_code', $district_id)->select('code','name','slug')->get();
            return response()->json($location);
        }

    }


    public function payRoom($id)
    {
        $room = Room::where([
            'id'      => $id,
            'auth_id' => Auth::user()->id,
            'status'  => Room::STATUS_EXPIRED
        ])->first();

        $viewData = [
            'room' => $room
        ];
  
        return view('user.pay.pay', $viewData);
    }

    public function savePayRoom($id, Request $request)
    {
        $room            = Room::find($id);
        $data            = $request->all();
        $roomType        = $request->room_type;
        $configPriceType = config('payment.type_price');
        $price           = $configPriceType[$roomType];
        $day             = $request->day;

        $totalMoney = $day * $price;
     
        $sodukhadung = Auth::user()->account_balance;
   
        if ($sodukhadung < $totalMoney) {
            return redirect()->back();
        }

        try {
            DB::beginTransaction();
           
            PaymentHistory::create([
                'user_id'    => Auth::user()->id,
                'room_id'    => $id,
                'money'      => $totalMoney,
                'type'       => $roomType,
                'service_id' => 0,
                'status'     => PaymentHistory::STATUS_SUCCESS,
                'created_at' => Carbon::now()
            ]);
            
            // Trừ tiền
           
            DB::table('users')->where('id', Auth::user()->id)
                ->decrement('account_balance', $totalMoney);
           
            $timeStartNow = Carbon::parse($request->thoigian_batdau);
      
            $timeStop     = $timeStartNow->addDay($request->day);
            // Update tin
            if($totalMoney>40000){
                $room->status      = Room::STATUS_ACTIVE;
            }else{
                $room->status      = Room::STATUS_PAID;
            }
          
            $room->time_start  = Carbon::parse($request->thoigian_batdau);
          
            $room->time_stop   = $timeStop->format('Y-m-d');
            $room->service_hot = $roomType;
            $room->updated_at  = Carbon::now();
            $room->save();
            DB::commit();
            $otp = rand(100000,999999);
            // Mail invoce
            $user = User::find(Auth::user()->id);
            $currentTime = now()->format('H:i d/m/Y'); 
            Mail::send('frontend.pages.email.invoiceroom',compact('user','room','currentTime','otp'),function($email) use ($user){
                $email->subject('Hoá đơn thanh toán bài đăng');
                $email->to('datn153364@gmail.com', $user);
            });
            return redirect()->route('get_user.room.home');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }


    public function hideRoom($id)
    {
        $room         = Room::find($id);
        $room->status = Room::STATUS_DEFAULT;
        $room->save();

        return redirect()->back();
    }

    public function activeRoom($id)
    {
        $today         = Date::today()->format('Y-m-d');
        $checkTimeRoom = Room::with('category:id,name,slug', 'district:id,name,slug')
            ->whereDate('time_start', '<=', $today)
            ->whereDate('time_stop', '>=', $today)
            ->find($id);

        if (!$checkTimeRoom) {
            DB::table('rooms')->where('id', $id)
                ->update([
                    'status'      => Room::STATUS_EXPIRED,
                    'service_hot' => 0
                ]);
        } else {
            DB::table('rooms')->where('id', $id)
                ->update([
                    'status' => Room::STATUS_ACTIVE,
                ]);
        }

        return redirect()->back();
    }
    protected function switchPrice($data)
    {
        switch ($data['price']) {
            case $data['price'] < 1000000:
                $data['range_price'] = 1;
                break;

            case ($data['price'] >= 1000000 && $data['price'] < 2000000):
                $data['range_price'] = 2;
                break;

            case ($data['price'] >= 2000000 && $data['price'] < 3000000):
                $data['range_price'] = 3;
                break;

            case ($data['price'] >= 3000000 && $data['price'] < 5000000):
                $data['range_price'] = 4;
                break;

            case ($data['price'] >= 5000000 && $data['price'] < 7000000):
                $data['range_price'] = 5;
                break;

            case ($data['price'] >= 7000000 && $data['price'] < 10000000):
                $data['range_price'] = 6;
                break;

            case ($data['price'] >= 10000000 && $data['price'] < 15000000):
                $data['range_price'] = 7;
                break;

            case ($data['price'] >= 15000000):
                $data['range_price'] = 8;
                break;
        }

        return $data;
    }

    protected function switchArea($data)
    {
        switch ($data['area']) {
            case $data['area'] < 20:
                $data['range_area'] = 1;
                break;

            case ($data['area'] >= 20 && $data['area'] < 30):
                $data['range_area'] = 2;
                break;

            case ($data['area'] >= 30 && $data['area'] < 50):
                $data['range_area'] = 3;
                break;

            case ($data['area'] >= 50 && $data['area'] < 60):
                $data['range_area'] = 4;
                break;

            case ($data['area'] >= 60 && $data['area'] < 70):
                $data['range_area'] = 5;
                break;

            case ($data['area'] >= 70 && $data['area'] < 80):
                $data['range_area'] = 6;
                break;

            case ($data['area'] >= 80 && $data['area'] < 100):
                $data['range_area'] = 7;
                break;

            case ($data['area'] >= 100 && $data['area'] < 120):
                $data['range_area'] = 8;
                break;

            case ($data['area'] >= 120 && $data['area'] < 150):
                $data['range_area'] = 9;
                break;

            case ($data['area'] >= 150):
                $data['range_area'] = 10;
                break;
        }

        return $data;
    }

    public function syncAlbumImageAndProduct($files, $roomID)
    {
        foreach ($files as $key => $fileImage) {
            $ext    = $fileImage->getClientOriginalExtension();
            $extend = [
                'png', 'jpg', 'jpeg', 'PNG', 'JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__') . Str::slug($fileImage->getClientOriginalName()) . '.' . $ext;
            $path     = public_path() . '/uploads/' . date('Y/m/d/');
            if (!File::exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileImage->move($path, $filename);
            DB::table('images')
                ->insert([
                    'name'       => $fileImage->getClientOriginalName(),
                    'path'       => $filename,
                    'room_id'    => $roomID,
                    'created_at' => Carbon::now()
                ]);
        }
    }
    public function invoice(){
        return view ('frontend.pages.email.invoiceroom');
    }



}
