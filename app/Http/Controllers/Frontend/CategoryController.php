<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Service\RoomService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Room;
use App\Models\Articles;
use App\Page\PageCategoryService;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function index($id,$slug,Request $request){
        
        $data = PageCategoryService::index($slug, $request);
        return view('frontend.pages.category.index', $data);
      
    }

    public function detail_rooms($id,$slug,Request $request){
        $room = Room::find($slug);
        $room->count_view = $room->count_view +1;
        $room->save();
        $category = Category::all();
        $orderBy = $request->input('sort', 'asc'); 
      
        $rooms_new = RoomService::getRoomsNewVip($limit =  10);
        $rooms_hot = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 5
        ]);
        $viewData = [
            'room' => $room,
            'rooms_hot' => $rooms_hot,
            'rooms_new' => $rooms_new,
            'category' => $category,
            'query' => $request->query()
        ];
        return view('frontend.pages.detail_room.detail_room',$viewData);
    }
}
