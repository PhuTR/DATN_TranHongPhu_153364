<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Http\Service\LocationService;

use Illuminate\Http\Request;

class PageHomeService
{
    public static function index(Request $request)
    {
        $roomHots    = RoomService::getRoomsHot($limit = 6);
        $roomVipFive = RoomService::getListsRoomVip($limit = 6, [
            'service_hot' => 5
        ]);

        $roomNew      = RoomService::getRoomsNew($limit =  10);
        $locationsHot = LocationService::getLocationsHot(3);
        $viewData = [
            'roomHots'     => $roomHots,
            'roomNew'      => $roomNew,
            'roomVipFive'  => $roomVipFive,
            'locationsHot' => $locationsHot
        ];

        return $viewData;
    }
}
