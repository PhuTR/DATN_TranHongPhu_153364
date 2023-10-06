<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Room;
use App\Models\Articles;
class PageCategoryService
{
    public static function index($id, Request $request)
    {
        $category = Category::find($id);
        $locaties = Location::where('hot',1)->get();
       
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $rooms    = RoomService::getListsRoom($request, $params = [
            'category_id' => $id
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
