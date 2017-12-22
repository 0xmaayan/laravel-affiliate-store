<?php

namespace App\Mail;


use App\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSubscribe extends Mailable {
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

  public function build(){
    return $this->subject('Hi There!!')
        ->from(config('mail.from.address', config("app.name"))
        ->markdown('emails.subscribes.new')
        ->attach('/path/to/file', [
          'as' => 'name.pdf',
          'mime' => 'application/pdf',
        ]));
  }
}