<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderMeta;
use App\Models\Notification;
use App\Models\ShippingDetail;
use App\Models\SubmitOrderAttachement;
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
        'submission_note',
        'final_review_note',
        "tracker_id",
        "is_completed",
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

    public function attachments()
    {
        return $this->hasMany(SubmitOrderAttachement::class, 'order_id', 'id');
    }

    public function zipFiles()
    {
        return $this->hasMany(SubmitOrderAttachement::class, 'order_id', 'id')
            ->where('attachment', 'LIKE', '%.zip');
    }

    public function shippingDetail()
    {
        return $this->hasOne(ShippingDetail::class, 'order_id', 'id');
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
