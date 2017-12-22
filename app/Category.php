<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use SoftDeletes, HasSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'image', 'second_image',
    ];

    protected $dates = ['deleted_at'];

    public function products(){
      return $this->hasMany('App\Product');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
      return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');
    }
}
