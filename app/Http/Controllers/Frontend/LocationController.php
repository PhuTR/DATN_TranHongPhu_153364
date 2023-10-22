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

    public function getRoomByDistrict($slug, $id, Request $request)
    {
        $data = PageLocationService::indexByDistrict($id, $request);

        return view('frontend.pages.location.index', $data);
    }

    public function getRoomByWards($slug, $id, Request $request)
    {
        $data = PageLocationService::indexByWards($id, $request);

        return view('frontend.pages.location.index', $data);
    }



    public function getRoomByCityCategory($id,$category_id, Request $request)
    {
        $data = PageLocationService::indexByCityCategory($id,$category_id, $request);

        return view('frontend.pages.location.index', $data);
    }

}
