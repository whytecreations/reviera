<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FlowerCategory
 *
 * @package App
 * @property string $banner
 * @property string $text
 * @property text $description
 * @property string $text_ar
 * @property text $description_ar
*/
class FlowerCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
    
    public function flowers()
	{
		return $this->hasMany(Flower::class);
	}
}
