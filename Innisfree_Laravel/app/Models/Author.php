<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'decription',
        'active',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
