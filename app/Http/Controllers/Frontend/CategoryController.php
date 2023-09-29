<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function index($id,$slug,Request $request){
        $category = Category::find($slug);
        if(!$category) return abort(404);


        $orderBy = $request->input('sort', 'desc'); 
        $rooms = Room::where('category_id', $slug)
            ->where('status',1)
            ->orderBy('id', $orderBy) 
            ->paginate(4);
        
        $orderBy_new = $request->input('sort', 'asc'); 
        $rooms_new = Room::orderBy('id', $orderBy_new) ->paginate(5);

        // $rooms = Room::where('category_id',$slug)->orderBy($orderBy)->paginate(4);
     
        $viewData = [
            'rooms' => $rooms,
            'rooms_new' => $rooms_new,
            'category' => $category,
            'query' => $request->query()
        ];
           
        return View('frontend.pages.category.index',$viewData);
    }

    public function detail_rooms($id,$slug,Request $request){
        $room = Room::find($slug);
        $room->count_view = $room->count_view +1;
        $room->save();
        $category = Category::all();
        $orderBy = $request->input('sort', 'asc'); 
        $rooms_new = Room::orderBy('id', $orderBy) ->paginate(4);

        $viewData = [
            'room' => $room,
            'rooms_new' => $rooms_new,
            'category' => $category,
            'query' => $request->query()
        ];
        return view('frontend.pages.detail_room.detail_room',$viewData);
    }
}
