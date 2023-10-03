<?php

namespace App\Http\Controllers\Admin;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(Request $request){
        $rooms = Room::with('category:id,name,slug', 'district:id,name,slug', 'wards:id,name,slug');
        if ($request->category_id)
            $rooms->where('category_id', $request->category_id);

        if ($request->n)
            $rooms->where('name', 'like', '%' . $request->n . '%');
        $rooms      = $rooms->orderByDesc('id')->paginate(10);
        $categories = Category::select('id', 'name')->get();
        $viewData = [
            'rooms' => $rooms,
            'categories' => $categories,
            'query'      => $request->query()
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


    public function success($id)
    {
        $room         = Room::find($id);
        $room->status = Room::STATUS_ACTIVE;
        $room->save();

        return redirect()->back();
    }

    public function expires($id)
    {
        $room            = Room::find($id);
        $room->status    = Room::STATUS_EXPIRED;
        $room->time_stop = date('Y-m-d');
        $room->save();

        return redirect()->back();
    }

    public function hide($id)
    {
        $room         = Room::find($id);
        $room->status = Room::STATUS_DEFAULT;
        $room->save();

        return redirect()->back();
    }

    public function cancel($id)
    {
        $room     = Room::find($id);
        $viewData = [
            'room' => $room
        ];

        return view('admin.pages.room.cancel', $viewData);
    }

    public function processCancelRoom($id, Request $request)
    {
        try {
            $room         = Room::find($id);
            $room->lydo = $request->lydo;
            $room->status = -1;
            $room->save();
            return redirect()->route('get_admin.room.index');
        } catch (\Exception $exception) {
            // Log::error("---------------------  " . $exception->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        Room::find($id)->delete();
        return redirect()->back();
    }
    

}
