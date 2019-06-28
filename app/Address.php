<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'country',
        'phone',
        'email',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
