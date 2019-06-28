<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'dob',
    ];

    public function wishlist()
    {
        return $this->hasMany(WishList::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getDefaultAddress()
    {
        return $this->addresses()->first();

    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function latestOrder()
    {
        return $this->hasMany(Order::class)->latest();
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ForgotPassword($token));
    }
}
