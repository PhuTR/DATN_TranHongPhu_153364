<?php

namespace App\Page;

use App\Http\Service\RoomService ;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchRoomService
{
    public static function index(Request $request)
    {
        $params = $request->all();
        if (isset($params['city_id'])) $params["city_id"] = $params['city_id'];
        if (isset($params['	district_id'])) $params["	district_id"] = $params['district_id'];
        if (isset($params['price'])) $params["price"] = $params['price'];
        if (isset($params['area'])) $params["area"] = $params['area'];
        $rooms_new      = RoomService::getRoomsNew($limit =  10);
        $rooms    = RoomService::getListsRoom($request, $params);
        return [
            'rooms'    => $rooms,
            'rooms_new'    => $rooms_new,
            'query'    => $request->query()
        ];
    }
}
