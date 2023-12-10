<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $guarded = [''];
    const STATUS_DEFAULT = 1; // khởi tạo
    const STATUS_PAID = 2; // đã thanh toán
    const STATUS_EXPIRED = -2; //hết hạn
    const STATUS_ACTIVE = 3; // đã duyệt
    const STATUS_CANCEL = -1; // huỷ bỏ

    protected $setStatus = [
        self::STATUS_DEFAULT => [
            'name' => 'Tài khoản đã bị khoá',
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
            'name' => 'Hoạt động',
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


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];
}
