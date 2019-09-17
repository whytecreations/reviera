<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

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

    protected $fillable = ['category_id', 'title', 'title_ar', 'big_price', 'small_price', 'description', 'note', 'description_ar', 'note_ar'];

    public function category()
    {
        return $this->belongsTo(FlowerCategory::class)->withTrashed();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200);
    }

}
