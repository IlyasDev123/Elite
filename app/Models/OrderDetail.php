<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'placement',
        'applique',
        'design_format',
        'threading_cute_size',
        'color_scheme',
    ];
}
