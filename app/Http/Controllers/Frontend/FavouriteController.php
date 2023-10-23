<?php

namespace App\Http\Controllers\Frontend;
use App\Page\PageFavouriteService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Favourite;

class FavouriteController extends Controller
{
    public function index(Request $request){
   
        $data = PageFavouriteService::index($request);
        return view('frontend.pages.favourite.index',$data);
    }

    public function addfavorites($id,Request $request){
        $room = DB::table('rooms')->where('id',$id)->first();
        if($room != null){
                $oldFavourite = Session('Favourite') ? Session('Favourite') : null;
                $newFavourite = new Favourite($oldFavourite);
                $newFavourite->AddFavorite($room,$id);
                $request->session()->put('Favourite',$newFavourite);
        }
        return view('frontend.pages.favourite.item-favourite');
        
    }

    public function deletefavorites($id,Request $request){

        $oldFavourite = Session('Favourite') ? Session('Favourite') : null;
        $newFavourite = new Favourite($oldFavourite);
        $newFavourite->DeleteFavorite($id);
        if(Count($newFavourite->rooms) > 0){
            $request->Session()->put('Favourite',$newFavourite);
        }
        else{
            $request->Session()->forget('Favourite');
        }
        return view('frontend.pages.favourite.item-favourite');

    }

}
