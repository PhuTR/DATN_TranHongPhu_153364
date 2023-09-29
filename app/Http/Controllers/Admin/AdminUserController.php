<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdminUserController extends Controller
{
    public function index(){
        $user = User::paginate(15);
        $viewData =[
            'user' => $user,
        ];
        return view('admin.pages.user.index',$viewData);
    }
}
