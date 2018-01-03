<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Mail\NewSubscribe;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

      $newSubscribe = Subscribe::create($subscribe);
      Mail::to($request->email)->send(new NewSubscribe($newSubscribe));
      return response()->json($newSubscribe->email);
    }
}
