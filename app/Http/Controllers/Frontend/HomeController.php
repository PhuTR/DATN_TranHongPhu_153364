<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Page\PageHomeService;
use App\Page\PageViewAllService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = PageHomeService::index($request);
        return view('frontend.pages.home.index', $data);
    }

    public function allview(Request $request){
   
        $data = PageViewAllService::index($request);
        return view('frontend.pages.home.full_item',$data);
    }
    public function lockaccount(){
        return view('frontend.pages.error.lock_account');
    }
    public function viewroom(Request $request){
        $room_id = $request->room_id;
        $room = Room::find($room_id);
        $images     = DB::table('images')->where("room_id", $room_id)->get();
        $output['star'] ="";
        $output['avatar'] = '<img style="width:70%;height:70%;border-radius:10%" src="'.pare_url_file($room->avatar).'"  alt="listing-small">';
        $output['image'] = "";
        for($i = 1 ; $i <= $room->service_hot ; $i ++){
            $output['star'] .= '<i style="color: #fed553" class="fa fa-star"></i>';
        }
        

        foreach ($images as $key => $item) {
            $output['image'] .= '<div class="' . ($key === 0 ? 'active' : '') . ' item carousel-item text-center">
                <img style="width: 100%; height: 800px; border-radius: 0%" src="' . pare_url_file($item->path) . '" class="img-fluid" alt="slider-listing">
            </div>';
        }
        
        $output['service_hot'] = $room->service_hot;
        if($room->service_hot==5){
            $output['name'] = '<span style="margin-top:0px;float:none;color:#FF385C">'.$room->name.'</span>';
        }elseif($room->service_hot==4){
            $output['name'] = '<span style="margin-top:0px;float:none;color:#ea2e9d">'.$room->name.'</span>';
        }elseif($room->service_hot==3){
            $output['name'] = '<span style="margin-top:0px;float:none;color:#f60">'.$room->name.'</span>';
        }elseif($room->service_hot==2){
            $output['name'] = '<span style="margin-top:0px;float:none;color:#3763e0">'.$room->name.'</span>';
        }elseif($room->service_hot==1){
            $output['name'] = '<span style="margin-top:0px;float:none;color:#055699">'.$room->name.'</span>';
        }
        $output['href'] = '<a style="color: #fff" href="' . route('get.category.detail', ['slug' => $room->slug, 'id' => $room->id]) . '" class="btn btn-primary">Xem chi tiết</a>';
        $output['address'] = $room->full_address;
        $output['price'] = number_format($room->price/1000000,1);
        $output['area'] = $room->area;
        $output['description'] = $room->description;
        echo json_encode($output);
    }
}
