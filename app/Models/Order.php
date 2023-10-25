<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_type',
        'name',
        'no_of_color',
        'name_of_color',
        'height',
        'width',
        'unit',
        'type',
        'time_frame',
        'placement',
        'applique',
        'design_format',
        'other_format',
        'threading_cute_size',
        'extra_instruction',
        'status'
    ];

    public function files()
    {
        return $this->hasMany(OrderMeta::class, 'order_id', 'id');
    }

    public function getOrderTypeAttribute($value)
    {
        return [
            1 => 'Digitizing',
            2 => 'Vector',
            3 => 'Custom Clothing',
            4 => 'Custom Patch',
        ][$value];
    }

    public function assignOrder()
    {
        return $this->hasOne(AssignOrder::class, 'order_id', 'id')->with('user:id,name');
    }

    public function submitOrder()
    {
        return $this->hasOne(SubmitOrder::class, 'order_id', 'id');
    }

    public function getTheardingCuteSizeAttribute($value)
    {
        $value = (int) $value;
        return $value ?
            [
                1 => 'Cut thread longer than 2 mm',
                2 => 'Cut all connection threads',
                3 => 'Do not cut threads',
            ][$value] : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
