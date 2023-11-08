<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdminUserController extends Controller
{
    public function index(Request $request){
        $users = User::whereRaw(1);

        if ($request->n)
            $users->where('name', 'like', '%' . $request->n . '%');

        $users = $users->orderByDesc('id')->paginate(20);

       
        $viewData =[
            'user' => $users,
            'query' => $request->query()
        ];
        return view('admin.pages.user.index',$viewData);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
}
