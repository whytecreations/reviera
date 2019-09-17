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
        'latitude',
        'longitude',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function shippingZone()
    {
        return $this->belongsTo(ShippingZone::class, 'city');
    }

    public function hasLocation()
    {
        return $this->latitude != null && $this->longitude != null;
    }

    public function getCity()
    {
        $city = $this->city;
        if (is_numeric($city)) {
            $city = $this->shippingZone->name;
        }
        return $city;
    }
    public function readable()
    {
        $city = $this->city;
        if (is_numeric($city)) {
            $city = $this->shippingZone->name;
        }

        return "<span>
        $this->first_name  $this->last_name  <br/>
         $this->address1 <br/>
         $this->address2 <br/>
         $city  $this->country <br/>
         Phone: $this->phone <br/>
         Email: $this->email <br/>

         </span>";
    }
}
