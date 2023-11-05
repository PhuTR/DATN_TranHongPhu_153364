<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = "districts";
    protected $guarded = [''];
    public function roomsD()
    {
        return $this->hasMany(Room::class, 'district_id','code');
    }
}
