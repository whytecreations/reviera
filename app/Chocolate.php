<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Chocolate extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['category_id', 'title', 'full_price','half_price','quarter_price','description','note'];

    public function category(){
        return $this->belongsTo(ChocolateCategory::class);
    }
    
}
