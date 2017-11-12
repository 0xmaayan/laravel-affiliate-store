<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

abstract class AdminController extends Controller
{


    public function __construct()
    {

    }

    public function uploadToS3($image,$folder){
      $imageFileName = $image->getClientOriginalName();
      $filePath = '/'.$folder.'/' . $imageFileName;
      Storage::disk('s3')->put($filePath, file_get_contents($image), 'public');
      return $imageFileName;
    }
}
