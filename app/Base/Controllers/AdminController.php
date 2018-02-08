<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
}
