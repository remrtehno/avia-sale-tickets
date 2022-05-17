<?php

namespace App\Services;


use App\Mail\TicketMarkDown;
use App\Models\Flights;
use Illuminate\Support\Facades\Mail;

class EmailService
{

  public const MESSAGES = [
    'date_arrival' => "Дата прибытия",
    'date' => "Дата отправки",
    'direction_to' => "Откуда",
    'direction_from' => "Куда",
    'price_adult' => "Цена билета за взрослого",
    'canceled' => "Рейс отменен"
    // 'price_child' => "Цена билета за ребенка",
    // 'price_infant' => "Цена билета за младенец",
  ];

  public function sendTicketsByOrder($emailCollection, $data)
  {
    foreach ($emailCollection as $email) {
      $data['to'] = $email;

      $this->emailApp($data);
    }
  }

  public function sendChangesOfFlights($emailCollection, $whatChanged, Flights $flight)
  {
    foreach ($emailCollection as $email) {
      $data['to'] = $email;
      $data['message'] = $whatChanged;
      $data['flight'] = $flight;
      $data['subject'] = "Поменялся рейс {$flight->flight}";

      $this->emailApp($data, 'native');
    }
  }

  public function emailApp($data, $type = null)
  {
    switch ($type) {
      case 'native': {
          $message = "Чтото поменялось в рейсе. Теперь: ";
          foreach (self::MESSAGES as $key => $msg) {
            $message .= ' ' . $msg . ' ' . $data['flight']->{$key};
          }

          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers = "From:" . $this->getSender();

          return mail($data['to'], $data['subject'], $message, $headers);
        }
      default: {
          return Mail::send(
            new TicketMarkDown($data)
          );
        }
    }
  }

  public function getSender()
  {
    return env('MAIL_FROM_ADDRESS');
  }
}
