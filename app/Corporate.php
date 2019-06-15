<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    protected $fillable = 
    [
        'corporate_type',
        'company_name',
        'address_type',
        'address',
        'number_of_employees',
        'nature_of_business',
        'person_in_charge',
        'position',
        'email',
        'mobile',
        'tel',
        'fax',
];
}
