<?php

namespace App\Page;

use App\Models\City;
use App\Models\Room;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Service\RoomService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use App\Http\Service\LocationService;
use App\Models\Image;

class PageHomeService
{
    public static function index(Request $request)
    {   
        $room_expriry = Room::where('time_stop','<=',now())->get();
        foreach ($room_expriry as $room) {
            $room->update(['status' => Room::STATUS_EXPIRED,'service_hot' => 0]);
        }
        $appUrl = parse_url( env('APP_URL'), PHP_URL_HOST);
        $roomHots    = RoomService::getRoomsHot($limit = 6);
        $roomVipFive = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 5
        ]);
        $locaties = City::where('hot',1)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $locationsHot = LocationService::getLocationsHot(3);
        if($request->price && $request->area){
            $rooms    = RoomService::getListsRoom($request, $params = [
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1), 
            ]);
           
            return [
                'appUrl' => $appUrl,
                'roomHots'     => $roomHots,
                'rooms'     => $rooms,
                'locaties'     => $locationsHot,
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
                'appUrl' => $appUrl,
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
                'appUrl' => $appUrl,
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
                'appUrl' => $appUrl,
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
