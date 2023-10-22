<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Http\Service\LocationService;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;

class PageFavouriteService
{

    public static function index(Request $request)
    {
        $roomHots    = RoomService::getRoomsHot($limit = 6);
        $roomVipFive = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 5
        ]);
        // $category = Category::find($id);
        $locaties = Location::where('hot',1)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $roomNew      = RoomService::getRoomsNew($limit =  10);
        $locationsHot = LocationService::getLocationsHot(3);
        $rooms    = RoomService::getListsRoom($request, $params = [
            
        ]);
        $viewData = [
            'roomHots'     => $roomHots,
            'rooms'     => $rooms,
            'locaties'     => $locaties,
            'rooms_new'      => $rooms_new,
            'roomVipFive'  => $roomVipFive,
            'locationsHot' => $locationsHot
        ];

        return $viewData;
    }

}
