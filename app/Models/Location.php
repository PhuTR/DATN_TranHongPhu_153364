<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Location extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $guarded = [''];

    protected $setType = [
        1 => 'Tỉnh thành',
        2 => 'Quận huyện',
        3 => 'Phường xã',
    ];

    public function getType(){
        return Arr::get($this->setType,$this->type, '.....');
    }

    public function roomsC()
    {
        return $this->hasMany(Room::class, 'city_id');
    }

    public function roomsD()
    {
        return $this->hasMany(Room::class, 'district_id');
    }
    public function roomsW()
    {
        return $this->hasMany(Room::class, 'wards_id');
    }
}
