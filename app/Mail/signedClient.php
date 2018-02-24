<?php

namespace App\Mail;


use App\Subscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class signedClient extends Mailable implements ShouldQueue{
  use Queueable, SerializesModels;

  protected $client;

  /**
   * Create a new subscribe instance.
   *
   * @param Subscribe $client
   * @internal param Subscribe $subscribe
   * @internal param Order $order
   */
  public function __construct(Subscribe $client)
  {
    $this->client = $client;
  }
/*
 *
 */
  public function build(){

    return $this->subject('New Signed Custom Styling Client')
        ->from(config('mail.from.address'), config('mail.from.name'))
        ->markdown('emails.subscribe.client')
        ->with(['clientName' => $this->client->name,
                'clientEmail' => $this->client->email,
                'clientMessage' => $this->client->message]);
  }
}