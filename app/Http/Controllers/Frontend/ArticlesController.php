<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Service\RoomService;
use Illuminate\Http\Request;
use App\Models\Articles;
class ArticlesController extends Controller
{
    public function index(Request $request){
     
        $rooms_new = RoomService::getRoomsNewVip($limit =  10);
 
        $viewData = [
   
        
            'rooms_new' => $rooms_new
        ];
        return view ('frontend.pages.articles.index', $viewData);
    }
    public function detail($id,$slug,Request $request){
        $article = Articles::find($slug);
        $rooms_new = RoomService::getRoomsNewVip($limit =  10);
        $viewData = [
            'rooms_new' => $rooms_new,
            'article' => $article
        ];
        return view ('frontend.pages.articles.detail',$viewData);
    }
    
}
