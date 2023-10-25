<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'product_id',
        'price',
        'is_reviewed',
        'no_of_review',
        'is_paid',
        'description',
        'status'
    ];

    public function assignOrder()
    {
        return $this->hasOne(AssignOrder::class, 'order_id', 'id')->with('user:id,name');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
