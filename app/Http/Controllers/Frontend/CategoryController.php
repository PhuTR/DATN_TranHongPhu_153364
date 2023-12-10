<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Room;
use App\Models\Articles;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Service\RoomService;
use App\Page\PageCategoryService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class CategoryController extends Controller
{
    public function index($id,$slug,Request $request){
        
        $data = PageCategoryService::index($slug, $request);
        return view('frontend.pages.category.index', $data);
      
    }

    public function detail_rooms($id,$slug,Request $request){
        
        $today = Date::today()->format('Y-m-d');

        $checkTimeRoom = Room::
            whereDate('time_start', '<=', $today)
            ->whereDate('time_stop', '>=', $today)
            ->find($slug);

        if (!$checkTimeRoom) {
            DB::table('rooms')->where('id', $slug)
                ->update([
                    'status'      => Room::STATUS_EXPIRED,
                    'service_hot' => 0
                ]);
        }
        $room = Room::whereIn('status', [Room::STATUS_ACTIVE, Room::STATUS_EXPIRED])->find($slug);
        if (!$room) return abort(404);
        $room->count_view = $room->count_view +1;
        $room->save();
        $category = Category::all();
        $images     = DB::table('images')->where("room_id", $slug)->get();
        // dd($images);
        $rooms_new = RoomService::getRoomsNewVip($limit =  10);
        $rooms_hot = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 3,
            'category_id'      => $room->category_id,
            // 'city_id' => $room->city_id,
        ]);

        $roomsSuggests = RoomService::getListsRoom($request, $params = [
            'category_id'      => $room->category_id,
            'city_id' => $room->city_id,
        ]);

        $viewData = [
            'room' => $room,
            'roomsSuggests' => $roomsSuggests,    
            'images' => $images,
            'rooms_hot' => $rooms_hot,
            'rooms_new' => $rooms_new,
            'category' => $category,
            'query' => $request->query()
        ];
        return view('frontend.pages.detail_room.detail_room',$viewData);
    }
}
