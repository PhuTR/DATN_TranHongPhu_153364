<?php

namespace App\Page;

use App\Http\Service\RoomService;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class PageLocationService
{
    public static function index($id, Request $request)
    {
        $location = Location::find($id);
        $params = $request->all();
        $params['location_city_id'] = $id;

        $rooms    = RoomService::getListsRoom($request, $params);
        $districts = Location::withCount('roomDistricts')->where('parent_id', $id)
            ->limit(24)->get();

        // dd($districts);
        return [
            'location'  => $location,
            'rooms'     => $rooms,
            'districts' => $districts,
            'query'     => $request->query()
        ];
    }
    public static function indexByCity($id, Request $request)
    {
        $location = Location::find($id);
        $districts =  Location::where('parent_id', $id)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'city_id' => $id,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1)
            ]);
            $districts =  Location::where('parent_id', $id)->get();
         
            return [
                'location'  => $location,
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
             
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
               
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
                  
                    'districts' => $districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'city_id' => $id,
                ]);
              
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location, 
                    'districts' => $districts,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByDistrict($id, Request $request)
    {
        $location = Location::find($id);
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'district_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'rooms_new'      => $rooms_new,
                'area' => ($request->area ? $request->area : -1)
            ]);
            $wards =  Location::where('parent_id', $id)->get();
            return [
                'location'  => $location,
                'wards' => $wards,
                'rooms'     => $rooms,
                'rooms_new'      => $rooms_new,
                'query'     => $request->query()
            ];
        } else {
            if ($request->price) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'price' => ($request->price ? $request->price : -1),

                ]);
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } elseif ($request->area) {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                    'area' => ($request->area ? $request->area : -1)
                ]);
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            } else {
                $rooms    = RoomService::getListsRoom($request, $params = [
                    'district_id' => $id,
                ]);
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
                    'wards' => $wards,
                    'rooms_new'      => $rooms_new,
                    'rooms'     => $rooms,
                    'query'     => $request->query()
                ];
            }
        }
    }

    public static function indexByWards($id, Request $request)
    {
        $location = Location::find($id);
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
        $location = Location::find($id);
        $districts =  Location::where('parent_id', $id)->get();
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'city_id' => $id,
                'rooms_new'      => $rooms_new,
                'districts' => $districts,
                'price' => ($request->price ? $request->price : -1),
                'area' => ($request->area ? $request->area : -1)
            ]);
            $districts =  Location::where('parent_id', $id)->get();
         
            return [
                'location'  => $location,
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
             
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
                   
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
               
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
              
                $districts =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
        dd($id);
        $category = Category::find($category_id);
        $location = Location::find($id);
        $rooms_new     = RoomService::getRoomsNewVip($limit =  10);
        if ($request->price && $request->area) {
            $rooms    = RoomService::getListsRoom($request, $params = [
                'district_id' => $id,
                'price' => ($request->price ? $request->price : -1),
                'rooms_new'      => $rooms_new,
                'category_id' =>  $category_id,
                'area' => ($request->area ? $request->area : -1)
            ]);
            $wards =  Location::where('parent_id', $id)->get();
            return [
                'location'  => $location,
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
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
                $wards =  Location::where('parent_id', $id)->get();
                return [
                    'location'  => $location,
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
        $location = Location::find($id);
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