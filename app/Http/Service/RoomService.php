<?php

namespace App\Http\Service;

use App\Models\Room;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;

class RoomService
{
    protected $column = ['id', 'avatar', 'name', 'description', 'full_address', 'price', 'updated_at', 'area', 'slug', 'service_hot','auth_id','count_view','city_id','district_id','wards_id','created_at','time_start','time_stop','category_id' ];

    public static function getRoomsHot($limit = 8)
    {
        $self = new self();
        return Room::where('hot', 1)
            ->whereIn('status', [Room::STATUS_ACTIVE, Room::STATUS_EXPIRED])
            ->limit($limit)->select($self->column)->get();
    }

    public static function getRoomsNew($limit = 10)
    {
        $self = new self();
        return Room::whereIn('status', [Room::STATUS_ACTIVE, Room::STATUS_EXPIRED])
            ->limit($limit)
            ->select($self->column)
            ->orderByDesc('id')
            ->get();
    }

    public static function getListsRoomVip($limit = 10, $params = [])
    {
        $self = new self();
        $room =  Room::whereIn('status', [Room::STATUS_ACTIVE, Room::STATUS_EXPIRED]);

        if ($service_hot =  Arr::get($params, 'service_hot')){
            $room->where('service_hot','>=', $service_hot);
        }
        if ($categoryId = Arr::get($params, 'category_id')) {
            $room->where('category_id', $categoryId);
        }

        if ($cityId = Arr::get($params, 'city_id')) {
            $room->where('city_id', $cityId);
        }

        if ($district_id = Arr::get($params, 'district_id')) {
            $room->where('district_id', $district_id);
        }
        return $room
            ->limit($limit)
            ->select($self->column)
            ->orderByDesc('id')
            ->get();
    }

    public static function getRoomsNewVip($limit = 10, $params = [])
    {
        $self = new self();
        $room =  Room::whereIn('status', [Room::STATUS_ACTIVE]);
        // $room->whereBetween('service_hot', [2, 4]);

        return $room
            ->select($self->column)
            ->orderByDesc('created_at')
            ->paginate($limit);
    }

    public static function getListsRoom($request, $params = [])
    {

        $self = new self();
        $rooms = Room::whereIn('status', [Room::STATUS_ACTIVE,Room::STATUS_EXPIRED]);

        if ($categoryId = Arr::get($params, 'category_id')) {
            $rooms->where('category_id', $categoryId);
        }

        if ($cityId = Arr::get($params, 'city_id')) {
            $rooms->where('city_id', $cityId);
        }

        if ($district_id = Arr::get($params, 'district_id')) {
            $rooms->where('district_id', $district_id);
        }
        if ($wards_id = Arr::get($params, 'wards_id')) {
            $rooms->where('wards_id', $wards_id);
        }
        if ($range_price = Arr::get($params, 'price')) {
            $rooms->where('range_price', $range_price);
        }

        if ($range_area = Arr::get($params, 'area')) {
            $rooms->where('range_area', $range_area);
        }

        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
            $orderBy = $request->input( 'sort', $sort); 
            $rooms = $rooms->select($self->column)->orderBy('service_hot', $orderBy)->paginate(10);
        }elseif(isset($_GET['view'])){
            $sort = $_GET['view'];
            $orderBy = $request->input( 'sort', $sort); 
            $rooms = $rooms->select($self->column)->orderBy('count_view', $orderBy)->paginate(10);
        }elseif(isset($_GET['new'])){
            $sort = $_GET['new'];
            $orderBy = $request->input( 'sort', $sort); 
            $rooms = $rooms->select($self->column)->orderBy('created_at', $orderBy)->paginate(10);
        }
        else{
            $orderBy = $request->input('sort', 'desc'); 
            $rooms = $rooms->select($self->column)->orderBy('service_hot', $orderBy)->paginate(10);
        }
        

       
        
        

        return $rooms;
    }
}
