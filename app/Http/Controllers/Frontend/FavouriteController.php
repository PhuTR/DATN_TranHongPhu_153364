<?php

namespace App\Http\Controllers\Frontend;
use App\Page\PageFavouriteService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index(Request $request){
   
        $data = PageFavouriteService::index($request);
        return view('frontend.pages.favourite.index',$data);
    }

    
}
