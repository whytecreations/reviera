<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingMethod extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',

        'name_ar',
        'description_ar',
    ];

    public function zones()
    {
        return $this->belongsToMany('App\ShippingZone')->withPivot('shipping_charge');
    }
}
