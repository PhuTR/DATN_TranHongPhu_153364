<?php

namespace App\Page;

use App\Models\City;
use App\Models\Room;
use App\Models\Ward;
use App\Models\Category;
use App\Models\District;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Service\RoomService;
use Illuminate\Support\Facades\DB;

class PageLocationService
{
    public static function index($id, Request $request)
    {
        $location = City::find($id);
        $params = $request->all();
        $params['location_city_id'] = $id;

        $rooms    = RoomService::getListsRoom($request, $params);
        // $districts = Location::withCount('roomDistricts')->where('parent_id', $id)
        //     ->limit(24)->get();

        // dd($districts);
        return [
            'location'  => $location,
            'rooms'     => $rooms,
            // 'districts' => $districts,
            'query'     => $request->query()
        ];
    }
    public static function indexByCity($id, Request $request)
    {
        $city = City::where('code',$id)->first();
        $districts =  District::where('city_code', $id)->get();
        $room_districts = Room::whereNotNull('district_id')
            ->where('city_id',$id)
            ->select(
                'district_id',
                DB::raw('COUNT(id) as room_count')
            )
            ->groupBy('district_id')
            ->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'city_id' => $id,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1)
            ]);
         
         
            return [
                'location'  => $city,
                'room_districts' => $room_districts,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'rooms'     => $rooms,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                    'price' => ($request->price ? $request->price : -1),

                ]);
                return [
                    'location'  => $city,
                    'rooms_new'      => $rooms_new,
                    'room_districts' => $room_districts,
                    'districts' => $districts,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                    'area' => ($request->area ? $request->area : -1)
                ]);
                return [
                    'location'  => $city,
                    'districts' => $districts,
                    'room_districts' => $room_districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                ]);
              
             
                return [
                    'location'  => $city, 
                    'districts' => $districts,
                    'room_districts' => $room_districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByDistrict($id, Request $request)
    {
        $location = District::where('code',$id)->first();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $wards =  Ward::where('district_code', $id)->get();

        $room_wards = Room::whereNotNull('wards_id')
            ->where('district_id', $id)
            ->select(
                'wards_id',
                DB::raw('COUNT(id) as room_count')
            )
            ->groupBy('wards_id')
            ->get();

        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'district_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'rooms_new'      => $rooms_new,
                'area' => ($request->area ? $request->area : -1)
            ]);
            
            return [
                'location'  => $location,
                'wards' => $wards,
                'rooms'     => $rooms,
                'rooms_new'      => $rooms_new,
                'room_wards' => $room_wards,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'price' => ($request->price ? $request->price : -1),

                ]);
               
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'room_wards' => $room_wards,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'area' => ($request->area ? $request->area : -1)
                ]);
               
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'room_wards' => $room_wards,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                ]);
               
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'room_wards' => $room_wards,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByWards($id, Request $request)
    {
        $location = Ward::where('code',$id)->first();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'wards_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1),
            ]);
            return [
                'location'  => $location,
                'rooms'     => $rooms,
                'rooms_new' => $rooms_new,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id,
                    'price' => ($request->price ? $request->price : -1),
                ]);



                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id,
                    'area' => ($request->area ? $request->area : -1)
                ]);



                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id
                ]);
                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByPrice($id, Request $request)
    {
        $rooms    = RoomService::getListsRoom($request, $params = [
            'price' => $id
        ]);
        return [
            'price'  => $id,
            'rooms'     => $rooms,
            'query'     => $request->query()
        ];
    }
    public static function indexByArea($id, Request $request)
    {
        $rooms    = RoomService::getListsRoom($request, $params = [
            'area' => $id
        ]);



        return [
            'area'  => $id,
            'rooms'     => $rooms,
            'query'     => $request->query()
        ];
    }


    public static function indexByCityCategory($id,$category_id, Request $request)
    {
        $category = Category::find($category_id);
        $location = City::where('code',$id)->first();
        $room_districts = Room::whereNotNull('district_id')
            ->where('city_id',$id)
            ->where('category_id',$category_id)
            ->select(
                'district_id',
                DB::raw('COUNT(id) as room_count')
            )
            ->groupBy('district_id')
            ->get();
        $districts =  District::where('city_code', $id)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'city_id' => $id,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1)
            ]);
          
         
            return [
                'location'  => $location,
                'room_districts'  => $room_districts,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'rooms'     => $rooms,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                    'price' => ($request->price ? $request->price : -1),

                ]);
             
               
                return [
                    'location'  => $location,
                    'room_districts'  => $room_districts,
                    'rooms_new'      => $rooms_new,
                    'districts' => $districts,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                    'area' => ($request->area ? $request->area : -1)
                ]);
               
             
                return [
                    'location'  => $location,
                    'room_districts'  => $room_districts,
                    'districts' => $districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                    'category_id' =>  $category_id,
                ]);
              
                $districts =  District::where('city_code', $id)->get();
                return [
                    'location'  => $location,
                    'room_districts'  => $room_districts,
                    'category' => $category,
                    'districts' => $districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByDistrictCategory($id,$category_id, Request $request)
    {
     
        $category = Category::find($category_id);
        $location = District::where('code',$id)->first();
        $room_wards = Room::whereNotNull('wards_id')
            ->where('district_id', $id)
            ->select(
                'wards_id',
                DB::raw('COUNT(id) as room_count')
            )
            ->groupBy('wards_id')
            ->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        $wards =  Ward::where('district_code', $id)->get();
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'district_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'rooms_new'      => $rooms_new,
                'category_id' =>  $category_id,
                'area' => ($request->area ? $request->area : -1)
            ]);
            
            return [
                'location'  => $location,
                'room_wards' => $room_wards,
                'wards' => $wards,
                'category' => $category,
                'rooms'     => $rooms,
                'rooms_new'      => $rooms_new,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'category_id' =>  $category_id,
                    'price' => ($request->price ? $request->price : -1),

                ]);
                
                return [
                    'location'  => $location,
                    'room_wards' => $room_wards,
                    'wards' => $wards,
                    'category' => $category,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'category_id' =>  $category_id,
                    'area' => ($request->area ? $request->area : -1)
                ]);
                
                return [
                    'location'  => $location,
                    'room_wards' => $room_wards,
                    'wards' => $wards,
                    'category' => $category,
                    'rooms_new' => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'category_id' =>  $category_id,
                ]);
                
                return [
                    'location'  => $location,
                    'room_wards' => $room_wards,
                    'wards' => $wards,
                    'category' => $category,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByWardsCategory($id,$category_id, Request $request)
    {
      
        $category = Category::find($category_id);
        $location = Ward::where('code',$id)->first();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'wards_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1),
                'category_id' =>  $category_id,
            ]);
            return [
                'location'  => $location,
                'rooms'     => $rooms,
                'category' => $category,
                'rooms_new' => $rooms_new,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id,
                    'price' => ($request->price ? $request->price : -1),
                    'category_id' =>  $category_id,
                ]);



                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'category' => $category,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id,
                    'area' => ($request->area ? $request->area : -1),
                    'category_id' =>  $category_id,
                ]);



                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'category' => $category,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'wards_id' => $id,
                    'category_id' =>  $category_id,
                ]);
                return [
                    'location'  => $location,
                    'rooms'     => $rooms,
                    'category' => $category,
                    'rooms_new'      => $rooms_new,
                    'query'     => $request->query()
                ];
            }
        }
    }



}