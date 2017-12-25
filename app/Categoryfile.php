<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoryfile extends Model
{
    use SoftDeletes;


    protected $fillable = ['image','second_image','category_id'];

    public function category(){
      return $this->belongsTo('App\Category');
    }
}
