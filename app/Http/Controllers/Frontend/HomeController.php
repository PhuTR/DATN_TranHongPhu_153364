<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Room;
class HomeController extends Controller
{
    public function index(){
        $rooms = Room::where('status',1)->orderBy('count_view','desc')->paginate(6);
        $new_room = Room::where('status',1)->orderBy('created_at','desc')->paginate(6);
        $locaties = Location::where('hot',1)->get();
        $location = Location::get();
        $viewData = [
            'locaties' => $locaties,
            'location' => $location,
            'rooms' => $rooms,
            'new_room' => $new_room
        ];
        return view('frontend.pages.home.index',$viewData);
    }

    public function allview(Request $request){
        $rooms = Room::where('status',1)->paginate(9);
        $orderBy_new = $request->input('sort', 'asc'); 

        $rooms_new = Room::orderBy('id', $orderBy_new) ->paginate(5);
        $viewData = [
            'rooms_new' => $rooms_new,
            'rooms' => $rooms
        ];
        return view('frontend.pages.home.full_item',$viewData);
    }
}
