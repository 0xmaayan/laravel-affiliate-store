<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name'
    ];
}
