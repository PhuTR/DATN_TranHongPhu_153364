<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function index(Request $request){
        $users = User::whereRaw(1);

        if ($request->n)
            $users->where('name', 'like', '%' . $request->n . '%');

        $users = $users->orderByDesc('id')->get();

       
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

    public function lockuser($id)
    {
        $user            = User::find($id);
        $user->status    = User::STATUS_DEFAULT;
        $user->save();

        return redirect()->back();
    }

    public function unlockuser($id)
    {
        $user         = User::find($id);
        $user->status = User::STATUS_ACTIVE;
        $user->save();

        return redirect()->back();
    }

    public function userdetail($id){
        $user = User::find($id);
        $rooms = Room::with('category:id,name')->where("auth_id", $id)->orderByDesc("id")->paginate(4);
        $viewData =[
            'rooms' => $rooms,
            'user' => $user,
        ];
        return view ('admin.pages.user.detail', $viewData);
    }
}
