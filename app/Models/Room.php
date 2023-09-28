<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = "rooms";
    protected $guarded = [''];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user() {
        return $this->belongsTo(User::class,'auth_id');
    }
    public function option(){
        return $this->belongsTo(Option::class,'subject_id');
    }
    public function location(){
        return $this->belongsTo(Location::class,'city_id');
    }
   
}
