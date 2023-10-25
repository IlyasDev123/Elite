<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_category',
        'product_quantity',
        'product_type',
        'description',
        'price',
        'attributes',
        'status'
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImages::class, 'product_id');
    }
}
