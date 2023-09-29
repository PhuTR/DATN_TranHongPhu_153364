<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(){
        $rooms = Room::orderByDesc('id')->paginate(6);

        $viewData = [
            'rooms' => $rooms
        ];
        return view('admin.pages.room.index', $viewData);
    }

    public function ApproveRoom($id){
        $room = Room::find($id);
        $room->status = 1;
        $room->save();
        return redirect()->route('get_admin.room.index');
    }

    public function UnApproveRoom($id){
        $room = Room::find($id);
        $room->status = 0;
        $room->save();
        return redirect()->route('get_admin.room.index');
    }

    public function delete($id){
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('get_admin.room.index');
    }

}
