<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\DecorateRequest;
use App\Mail\NewSubscribe;
use App\Mail\signedClient;
use App\Subscribe;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Application\SubscribeRequest;

class SubscribesController extends Controller {

  public function create(SubscribeRequest $request)
  {
    $subscribe = ['email' => $request->email];

    $newSubscribe = Subscribe::create($subscribe);
    Mail::to($request->email)->send(new NewSubscribe($newSubscribe));

    return response()->json($newSubscribe->email);
  }

  public function decorate(DecorateRequest $request)
  {
    $client = [
      'email' => $request->email,
      'name' => $request->name,
      'message' => $request->message,
    ];

    $newClient = Subscribe::create($client);
    //Mail::to(config('mail.from.address'))->send(new signedClient($newClient));

    return response()->json($newClient);
  }
}
