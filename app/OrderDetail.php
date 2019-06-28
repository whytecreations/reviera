<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_image',
        'product_type',
        'product_size',
        'quantity',
        'amount',
        'discount',
        'total_amount',
        'status',
    ];
}
