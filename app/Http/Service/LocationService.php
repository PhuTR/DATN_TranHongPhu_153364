<?php


namespace App\Http\Service;

use App\Models\City;

class LocationService
{
    public static function getLocationsHot($limit)
    {
        return City::withCount('roomsC')->where('hot', 1)->limit($limit)->get();
    }
}
