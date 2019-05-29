<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FlowerVariation
 *
 * @package App
 * @property string $banner
 * @property string $text
 * @property text $description
 * @property string $text_ar
 * @property text $description_ar
*/
class FlowerVariation extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','value'];
    protected $hidden = [];
    
    public function flowers()
	{
		return $this->hasMany(Flower::class,'category_id','id');
	}
}
