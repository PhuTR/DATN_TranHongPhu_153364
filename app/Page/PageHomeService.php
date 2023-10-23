<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Http\Service\LocationService;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;

class PageHomeService
{
    public static function index(Request $request)
    {
        $roomHots    = RoomService::getRoomsHot($limit = 6);
        $roomVipFive = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 5
        ]);
        $locaties = Location::where('hot',1)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $locationsHot = LocationService::getLocationsHot(3);
        
        if($request->price && $request->area){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1), 
            ]);
            return [
                'roomHots'     => $roomHots,
                'rooms'     => $rooms,
                'locaties'     => $locaties,
                'rooms_new'      => $rooms_new,
                'roomVipFive'  => $roomVipFive,
                'locationsHot' => $locationsHot,
                'query'    => $request->query()
            ];
        }
        elseif($request->price){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'price' => ($request->price ? $request->price : -1),
            ]);
            return [
                'roomHots'     => $roomHots,
                'rooms'     => $rooms,
                'locaties'     => $locaties,
                'rooms_new'      => $rooms_new,
                'roomVipFive'  => $roomVipFive,
                'locationsHot' => $locationsHot,
                'query'    => $request->query()
            ];
        }
        elseif($request->area){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'area' => ($request->area ? $request->area : -1), 
            ]);
            return [
                'roomHots'     => $roomHots,
                'rooms'     => $rooms,
                'locaties'     => $locaties,
                'rooms_new'      => $rooms_new,
                'roomVipFive'  => $roomVipFive,
                'locationsHot' => $locationsHot,
                'query'    => $request->query()
            ];
        }
        else{
            $rooms    = RoomService::getListsRoom($request, $params = [
            ]);
            return [
                'roomHots'     => $roomHots,
                'rooms'     => $rooms,
                'locaties'     => $locaties,
                'rooms_new'      => $rooms_new,
                'roomVipFive'  => $roomVipFive,
                'locationsHot' => $locationsHot,
                'query'    => $request->query()
            ];
    
          
        }
    }
}
