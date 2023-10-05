<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Room;



class PageViewAllService
{
    public static function index(Request $request)
    {
        $category = Category::get();
        $locaties = Location::where('hot',1)->get();
     
        $rooms_new      = RoomService::getRoomsNew($limit =  10);
        $rooms    = RoomService::getListsRoom($request, $params = [
            
        ]);
        return [
            'category' => $category,
            'locaties' => $locaties, 
            'rooms'    => $rooms,
            'rooms_new'    => $rooms_new,
            'query'    => $request->query()
        ];
    }
}
