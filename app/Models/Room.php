<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(City::class,'city_id','code');
    }


    const STATUS_DEFAULT = 1; // khởi tạo
    const STATUS_PAID = 2; // đã thanh toán
    const STATUS_EXPIRED = -2; //hết hạn
    const STATUS_ACTIVE = 3; // đã duyệt
    const STATUS_CANCEL = -1; // huỷ bỏ


    protected $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'text-black-50'
        ],
        self::STATUS_EXPIRED => [
            'name' => 'Hết hạn',
            'class' => 'text-danger'
        ],
        self::STATUS_PAID => [
            'name' => 'Đã thanh toán',
            'class' => 'text-info'
        ],
        self::STATUS_ACTIVE => [
            'name' => 'Hiển thị',
            'class' => 'text-success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Đã huỷ',
            'class' => 'text-danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->setStatus, $this->status, []);
    }
    public function paymentHistory()
    {
        return $this->hasMany(PaymentHistory::class, 'room_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id','code');
    }
    public function wards()
    {
        return $this->belongsTo(Ward::class, 'wards_id','code');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id','code');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'room_id', 'id');
    }
}
