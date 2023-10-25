<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitOrderAttachement extends Model
{
    use HasFactory;
    protected $fillable = [
        'submit_order_id',
        'attachment'
    ];
}
