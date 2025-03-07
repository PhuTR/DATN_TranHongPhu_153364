<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = "wards";
    protected $guarded = [''];
    public function roomsW()
    {
        return $this->hasMany(Room::class, 'wards_id','code');
    }
}
