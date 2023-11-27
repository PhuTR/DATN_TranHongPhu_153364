<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Page\PageLocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getRoomByCity($slug, $id, Request $request)
    {
        $data = PageLocationService::indexByCity($id, $request);

        return view('frontend.pages.location.index', $data);
    }

    public function getRoomByDistrict($id, Request $request)
    {
        $data = PageLocationService::indexByDistrict($id, $request);

        return view('frontend.pages.location.index', $data);
    }

    public function getRoomByWards( $id, Request $request)
    {
        $data = PageLocationService::indexByWards($id, $request);

        return view('frontend.pages.location.index', $data);
    }



    public function getRoomByCityCategory($id,$category_id, Request $request)
    {
        $data = PageLocationService::indexByCityCategory($id,$category_id, $request);
        return view('frontend.pages.location.index', $data);
    }

    public function getRoomByDistrictCategory($id,$category_id, Request $request)
    {
        $data = PageLocationService::indexByDistrictCategory($id,$category_id, $request);

        return view('frontend.pages.location.index', $data);
    }

    public function getRoomByWardsCategory($id,$category_id, Request $request)
    {
        $data = PageLocationService::indexByWardsCategory($id,$category_id, $request);

        return view('frontend.pages.location.index', $data);
    }

}
