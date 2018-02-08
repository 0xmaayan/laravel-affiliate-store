<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

abstract class AdminController extends Controller
{


    public function __construct()
    {
      $this->middleware('auth');
    }

    public function createFolder($folder){
      $public_dir = public_path($folder);
      if (!file_exists($public_dir)) {
        mkdir($public_dir, 0777, true);
      }
      return $public_dir;
    }

    public function createImage($file,$public_dir){
      $img = Image::make($file)->fit(220, 180);
      $data['image'] = time().$img->basename.'.jpg';
      $img->save($public_dir.$data['image']);

      return $data;
    }

  public function createProductImage($file,$public_dir,$product_id){
    $img = Image::make($file)->fit(220, 220,function ($constraint) {
        $constraint->upsize();
      });
    $data['main_image'] = env('APP_URL').'/uploads/products/'.$product_id.'/'.$img->basename.'.jpg';
    $img->save($public_dir.$img->basename.'.jpg');

    return $data;
  }
}
