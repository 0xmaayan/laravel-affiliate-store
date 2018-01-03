<?php

namespace App\Mail;


use App\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscribe extends Mailable implements ShouldQueue{
  use Queueable, SerializesModels;

  protected $subscribe;

  /**
   * Create a new subscribe instance.
   *
   * @param Subscribe $subscribe
   * @internal param Order $order
   */
  public function __construct(Subscribe $subscribe)
  {
    $this->subscribe = $subscribe;
  }
/*
 *
 */
  public function build(){

    return $this->subject('Hi There!!')
        ->from(config('mail.from.name'), config('app.name'))
        ->markdown('emails.subscribe.new')
        ->with('subscribe', $this->subscribe)
        ->attach('/public/images/footer-logo.png');

  }
}