<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
        protected $fillable=[
            'product_name',
            'product_year',
            'product_price',
            'product_price_pre',
            'product_image',
            'product_detail',
            'product_manual',
            'product_quantity',
            'active',
            'category_id',
            'supplier_id',
            'author_id',
            'product_capacity',
            'product_ingredient',
            'product_useNote',
            'product_expiry'

    ];
    // public function author()
    // {
    //     return $this->belongsTo(Author::class);
    // }
    // public function category()
    // {
    //     return $this->belongsTo(Author::class);
    // }
    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class);
    // }
}
