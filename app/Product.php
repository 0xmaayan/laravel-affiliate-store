<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
  use SoftDeletes, HasSlug;

  protected $fillable = [
    'name',
    'link',
    'price',
    'main_image',
    'category_id',
    'brands_id',
    'slug',
    'type'
  ];

  protected $dates = ['deleted_at'];

  public function category(){
    return $this->belongsToMany('App\Category');
  }

  public function brands(){
    return $this->belongsTo('App\Brand');
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
