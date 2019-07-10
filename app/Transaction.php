<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'transaction_request',
        'transaction_response',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
