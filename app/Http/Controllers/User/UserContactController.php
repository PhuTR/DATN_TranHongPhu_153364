<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    public function index(){
        return view('frontend.pages.contact.index');
    }
}
