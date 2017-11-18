<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{

  protected $fillable = [
    'logo',
    'title',
    'seo_description',
    'seo_keywords',
    'email',
    'instagram',
    'pinterest',
  ];

}
