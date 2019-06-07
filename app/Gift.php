<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Gift extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = [ 'title','description','note'];
}
