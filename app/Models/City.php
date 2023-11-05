<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class City extends Model
{
    use HasFactory;
    protected $table = "citys";
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
        return $this->hasMany(Room::class, 'city_id','code');
    }

}
