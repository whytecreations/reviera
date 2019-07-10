<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['amount',
        'billing_address_id',
        'shipping_address_id',
        'payment_method',
        'transaction_id',
        'shipping_cost',
        'coupen',
        'discount',
        'amount',
        'coupen_discount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function billing_address()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }
    public function shipping_address()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public static function getOrderStatus(Order $order)
    {
        $status = '';
        switch ($order->status) {
            case 0:
                $status = 'Cancelled';
                break;
            case 1:
                $status = 'Placed';
                break;
            case 2:
                $status = 'Recieved';
                break;
            case 3:
                $status = 'Processed';
                break;
            case 4:
                $status = 'Completed';
                break;
            default:
                $status = "N/A";
        }
        return $status;
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
