<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
  protected $fillable = [
    'name', 'files', 'content'
  ];

  protected $casts = [
    'files' => 'array',
  ];
}
