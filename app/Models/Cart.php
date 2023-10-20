<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'sub_total_price',
    ];

    protected $hidden = [

    ];

    public function order()
    {
        return $this->belongsTo(Product::class, 'order_id', 'id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
