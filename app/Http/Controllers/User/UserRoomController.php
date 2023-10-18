<?php

namespace App\Http\Controllers\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRoomRequest;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;
use App\Models\Room;
use App\Models\Option;
use App\Models\PaymentHistory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UserRoomController extends Controller
{
    public function index(Request $request){
        $rooms = Room::with('category:id,name')->where("auth_id", Auth::user()->id)->orderByDesc("id")->paginate(4);
        $viewData = [
            'rooms' => $rooms,
        ];
        return view('user.room.index',$viewData);
    }

    public function create(Request $request){
        $citys = Location::select('id','name')->where('type',1)->get();
        $districts = Location::select('id','name')->where('type',2)->get();
        $wards = Location::select('id','name')->where('type',3)->get();

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
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$request->avatar))
               unlink('uploads/avatars/'.$request->avatar);

            $file->move('uploads/avatars',$Hinh);
            $data['avatar'] = $Hinh;
         }  
         $json_img ="";
         if ($request->hasFile('hinhanh')){
            $arr_images = array();
            $inputfile =  $request->file('hinhanh');
            foreach ($inputfile as $filehinh) {
               $namefile = "phongtro-".str_random(5)."-".$filehinh->getClientOriginalName();
               while (file_exists('uploads/images'.$namefile)) {
                 $namefile = "phongtro-".str_random(5)."-".$filehinh->getClientOriginalName();
               }
              $arr_images[] = $namefile;
              $filehinh->move('uploads/images',$namefile);
            }
            $json_img =  json_encode($arr_images,JSON_FORCE_OBJECT);
         }
         else {
            $arr_images[] = "no_img_room.png";
            $json_img = json_encode($arr_images,JSON_FORCE_OBJECT);
         }
         $data['images'] = $json_img;
      

        $room = Room::create($data);
        if($room){
            return redirect()->route('get_user.room.home');
        }else{
           return redirect()->back();
        }
    }

   


    public function edit($id,Request $request){


        $room = Room::where(['id' => $id,'auth_id' => Auth::user()->id])->first();

        if(!$room) return abort(404);
        $citys = Location::select('id','name')->where('type',1)->get();
        $districts = Location::select('id','name')->where('type',2)->get();
        $wards = Location::select('id','name')->where('type',3)->get();
        $categories = Category::select('id','name')->get();
        $optisons = Option::select('id','name')->get();
        $viewData = [
            'citys' => $citys,
            'districts' => $districts,
            'wards' => $wards,
            'categories' => $categories,
            'optisons' => $optisons,
            'room' => $room,
            
        ];



        return view ('user.room.update', $viewData);
    }

    public function update($id,Request $request){
        
        $data = $request->except('_token');
        $data['updated_at'] = Carbon::now();
        $data['price'] = str_replace('.', '', $request->price);
        $data['slug'] = Str::slug($request->name);
        $data = $this->switchPrice($data);
        $data = $this->switchArea($data);
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/index')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar123-'.$request->username.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatar/'.$request->avatar))
               unlink('uploads/avatars/'.$request->avatar);

            $file->move('uploads/avatars',$Hinh);
            $data['avatar'] = $Hinh;
         }  

 

        $json_img = "";

        if ($request->hasFile('images')) {
            $arr_images = array();
            $inputfile = $request->file('images');
            foreach ($inputfile as $filehinh) {
                $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                while (file_exists('uploads/images' . $namefile)) {
                    $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                }
                $arr_images[] = $namefile;
                $filehinh->move('uploads/images', $namefile);
            }
            $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
            $data['images'] = $json_img;

        }
    
        $room = Room::where(['id' => $id,'auth_id' => Auth::user()->id])->update($data);
        if($room){
            // $room->images = $json_img;
            
            return redirect()->route('get_user.room.home');
        }else{
           return redirect()->back();
        }
    }
   
    



    public function loadDistrict(Request $request){
        if($request->ajax()){
            $city = $request->city_id;
            $location = Location::where('parent_id', $city)->select('id','name','slug')->get();
            return response()->json($location);
        }

    }

    public function loadWards(Request $request){
        if($request->ajax()){
            $district_id = $request->district_id;
            $location = Location::where('parent_id', $district_id)->select('id','name','slug')->get();
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



}
