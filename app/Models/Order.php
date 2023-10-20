<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'order_type',
        'order_code',
    ];

    protected $hidden = [

    ];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}
