<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChocolateCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','slug'];
    protected $hidden = [];
    
    public function flowers()
	{
		return $this->hasMany(Flower::class,'category_id','id');
	}
}
