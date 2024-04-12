<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'user_info_id', 'total', 'sub_total', 'delivery_fee', 'discount','is_in_town'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userInfo()
    {
        return $this->belongsTo(UserInfo::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

