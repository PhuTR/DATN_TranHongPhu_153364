<?php


namespace App\Http\Service;

use App\Models\Location;

class LocationService
{
    public static function getLocationsHot($limit)
    {
        return Location::withCount('roomsC')->where('hot', 1)->limit($limit)->get();
    }
}
