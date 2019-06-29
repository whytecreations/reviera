<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Gift extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = ['title', 'description', 'note', 'title_ar', 'description_ar', 'note_ar'];
}
