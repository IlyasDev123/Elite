<?php

namespace App\Models;

use App\Models\SubmitOrderAttachement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmitOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'atachment',
        'description',
        'price',
        'is_paid',
        'is_reviewed',
        'no_of_review',
        'status',
    ];

    public function attachments()
    {
        return $this->hasMany(SubmitOrderAttachement::class, 'submit_order_id', 'id');
    }

    public function zipFiles()
    {
        return $this->hasMany(SubmitOrderAttachement::class, 'submit_order_id', 'id')
            ->where('attachment', 'LIKE', '%.zip');
    }
}
