<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index(){
        return view ('frontend.pages.price_list.index');
    }
}
