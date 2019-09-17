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
        'note',
        'quantity',
        'amount',
        'discount',
        'total_amount',
        'status',
    ];

    public function product()
    {
        if ($this->product_type == 'flower') {
            return $this->belongsTo(Flower::class, 'product_id', 'id')->withTrashed();
        } else {
            return $this->belongsTo(Chocolate::class, 'product_id', 'id')->withTrashed();
        }
    }
}
