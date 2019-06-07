<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable = [ 'product_id','product_type','user_id'];

    public function product()
	{
        if($this->product_type== 'flower'){
            return $this->belongsTo(Flower::class,'product_id','id');
        }else{
            return $this->belongsTo(Chocolate::class,'product_id','id');
        }
	}
}
