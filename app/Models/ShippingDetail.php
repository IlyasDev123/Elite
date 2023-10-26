<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'address',
        'city',
        'country',
        'zip_code',
        'phone_number',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
