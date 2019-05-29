<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

/**
 * Class Flower
 *
 * @package App
 * @property string $text
 * @property text $description
 * @property string $text_ar
 * @property text $description_ar
*/
class Flower extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['category_id', 'title', 'big_price','small_price','description','note'];

    public function category(){
        return $this->belongsTo(FlowerCategory::class);
    }
    
}
