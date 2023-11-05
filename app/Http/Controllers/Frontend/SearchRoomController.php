<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Page\SearchRoomService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\City;

class SearchRoomController extends Controller
{
    public function index(Request $request)
    {
        $data = SearchRoomService::index($request);
       
        if ($request->city_id) {
            $districts = City::where('code', $request->city_id)->get();
            $data['districts'] = $districts;
        }
    
        return view('frontend.pages.search_room.index', $data);
    }
}
