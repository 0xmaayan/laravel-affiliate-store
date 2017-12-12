<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Subscribe;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Application\SubscribeRequest;

class SubscribesController extends AdminController
{

    public function index(Request $request){
      $subscribes = Subscribe::all();

      if ($request->ajax()){
        return Datatables::of($subscribes)->make(true);
      }

      return view('admin.subscribes.index',compact('subscribes'));
    }

    public function create(SubscribeRequest $request){
      $subscribe = ['email' => $request->email];

      $data = Subscribe::create($subscribe);
      return response()->json($data->email);
    }
}
