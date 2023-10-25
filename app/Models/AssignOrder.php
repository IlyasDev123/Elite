<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'assigned_by', // 'user_id
        'user_id',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
