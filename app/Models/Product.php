<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'image',
    ];

    protected $hidden = [

    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'product_id', 'id');
    }

}
