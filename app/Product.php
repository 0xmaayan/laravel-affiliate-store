<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name',
    'link',
    'price',
    'main_image',
    'second_image',
    'category_id',
  ];

  protected $dates = ['deleted_at'];

  public function category(){
    return $this->hasOne('App\Category');
  }
}
