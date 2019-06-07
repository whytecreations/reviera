<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class Customer extends Authenticatable
{
		use  Notifiable;
		
		protected $guard = 'customer';

    protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'password',
		'dob',
	];

	public function wishlist()
	{
		return $this->hasMany(WishList::class,'user_id');
	}

}
