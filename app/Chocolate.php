<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Chocolate extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['category_id', 'title', 'price','description'];

    public function category(){
        return $this->belongsTo(ChocolateCategory::class);
    }
    
}
