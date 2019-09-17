<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//  // Order Status
// Placed
// Processing
// Declined
// Cancelled By Customer
// Out For Delivery
// Delivered

class Order extends Model
{
    protected $fillable = ['amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method_id',
        'shipping_zone_id',
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

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class)->withTrashed();
    }

    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class)->withTrashed();
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

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getStatusColor()
    {
        //  // Order Status
        // Placed
        // Processing
        // Declined
        // Cancelled By Customer
        // Out For Delivery
        // Delivered
        switch ($this->status) {
            case 'Placed':
                return 'success';
            case 'Processing':
                return 'success';
            case 'Declined':
                return 'danger';
            case 'Cancelled By Customer':
                return 'danger';
            case 'Out For Delivery':
                return 'primary';
            case 'Delivered':
                return 'success';
            default:
                return "default";
        }
    }
}
