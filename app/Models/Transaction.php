<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'stripe_response',
        'order_id',
        'user_id',
        'amount',
        'invoice_url',
    ];
}
