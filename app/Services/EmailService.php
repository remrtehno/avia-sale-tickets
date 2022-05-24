<?php

namespace App\Services;


use App\Mail\TicketMarkDown;
use App\Models\Flights;
use Illuminate\Support\Facades\Mail;

class EmailService
{
  public const EMAILS = [
    "CHANGED_FLIGHT" => "CHANGED_FLIGHT"
  ];

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

      $this->emailApp($data, self::EMAILS['CHANGED_FLIGHT']);
    }
  }

  public function emailApp($data, $type = null)
  {
    switch ($type) {
      case self::EMAILS['CHANGED_FLIGHT']: {
          $message = "Чтото поменялось в рейсе. Теперь: ";
          foreach (self::MESSAGES as $key => $msg) {
            $message .= ' ' . $msg . ' ' . $data['flight']->{$key};
          }

          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= "From:" . $this->getSender();

          return mail($data['to'], $data['subject'], $message, $headers);
        }
      default: {

          // (A) EMAIL SETTINGS
          $mailTo = $data['to'];
          $mailSubject = "Рейс {$data['flight']->flight}";
          $mailMessage = "<strong>Билеты на рейс {$data['flight']->getSummary()}</strong>";
          $mailAttach = $data['file'];
          $basename = now() . " tickets.pdf";

          // (B) GENERATE RANDOM BOUNDARY TO SEPARATE MESSAGE & ATTACHMENTS
          // https://www.w3.org/Protocols/rfc1341/7_2_Multipart.html
          $mailBoundary = md5(time());
          $mailHead = implode("\r\n", [
            "MIME-Version: 1.0",
            "Content-Type: multipart/mixed; boundary=\"$mailBoundary\"",
            "From: {$this->getSender()}",
          ]);

          // (C) DEFINE THE EMAIL MESSAGE
          $mailBody = implode("\r\n", [
            "--$mailBoundary",
            "Content-type: text/html; charset=utf-8",
            "",
            $mailMessage
          ]);


          // (D) MANUALLY ENCODE & ATTACH THE FILE
          $mailBody .= implode("\r\n", [
            "",
            "--$mailBoundary",
            "Content-Type: application/octet-stream; name=\"" . $basename . "\"",
            "Content-Transfer-Encoding: base64",
            "Content-Disposition: attachment",
            "",
            chunk_split(base64_encode(($mailAttach))),
            "--$mailBoundary--"
          ]);

          // (E) SEND
          return mail($mailTo, $mailSubject, $mailBody, $mailHead);


          return Mail::send(
            new TicketMarkDown($data)
          );
        }
    }
  }


  public function approveEmail($to)
  {
    $message = "Поздравляем с успешной регистрацией в InAvia.online!
    
    Ваше имя пользователя :
    Ваш пароль :
    
    С уважением,
    
    InAvia.online
    
    По техническим вопросам, просим писать на support@inavia.online";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $this->getSender();

    return mail($to, 'Успешная регистрация', $message, $headers);
  }

  public function getSender()
  {
    return env('MAIL_FROM_ADDRESS');
  }
}
