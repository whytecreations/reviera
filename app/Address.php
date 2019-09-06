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

    public function hasLocation()
    {
        return $this->latitude != null && $this->longitude != null;
    }

    public function readable()
    {
        return "<span>
        $this->first_name  $this->last_name  <br/>
         $this->address1 <br/>
         $this->address2 <br/>
         $this->city - $this->country <br/>
         Phone: $this->phone <br/>
         Email: $this->email <br/>

         </span>";
    }
}
