<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Room;
use App\Models\Articles;
use App\Models\City;

class PageCategoryService
{
    public static function index($id, Request $request)
    {
        $category = Category::find($id);
        $locaties = City::where('hot',1)->get();
       
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);

        if($request->price && $request->area){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'category_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1),
            
            ]);
            return [
                'category' => $category,
                'locaties' => $locaties, 
                'rooms'    => $rooms,
                'rooms_new'    => $rooms_new,
                'query'    => $request->query()
            ];
        }
        elseif($request->price){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'category_id' => $id,
                'price' => ($request->price ? $request->price : -1),
            ]);
            return [
                'category' => $category,
                'locaties' => $locaties, 
                'rooms'    => $rooms,
                'rooms_new'    => $rooms_new,
                'query'    => $request->query()
            ];
        }
        elseif($request->area){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'category_id' => $id,
                'area' => ($request->area ? $request->area : -1)
            ]);
            return [
                'category' => $category,
                'locaties' => $locaties, 
                'rooms'    => $rooms,
                'rooms_new'    => $rooms_new,
                'query'    => $request->query()
            ];
        }
        else{
            $rooms    = RoomService::getListsRoom($request, $params = [
                'category_id' => $id,
               
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
}
