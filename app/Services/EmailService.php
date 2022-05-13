<?php

namespace App\Services;


use App\Mail\TicketMarkDown;
use Illuminate\Support\Facades\Mail;

class EmailService
{
  public function sendTicketsByOrder($emailCollection, $data)
  {
    foreach ($emailCollection as $email) {
      $data['to'] = $email;

      Mail::send(
        new TicketMarkDown($data)
      );
    }
  }
}
