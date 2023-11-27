<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Page\PageHomeService;
use App\Page\PageViewAllService;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function index(Request $request){
        $data = PageHomeService::index($request);
        return view('frontend.pages.home.index', $data);
    }

    public function allview(Request $request){
   
        $data = PageViewAllService::index($request);
        return view('frontend.pages.home.full_item',$data);
    }
}
