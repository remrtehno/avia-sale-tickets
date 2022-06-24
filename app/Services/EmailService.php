<?php

namespace App\Services;


use App\Mail\TicketMarkDown;
use App\Models\Flights;
use App\Models\Order;
use App\Models\User;
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

  private $PDFService;

  public function __construct(PDFService $pDFService)
  {
    $this->PDFService = $pDFService;
  }

  public function sendTicketsByOrder($emailCollection, $data)
  {
    foreach ($emailCollection as $email) {
      $data['to'] = $email;

      $this->emailApp($data);
    }
  }

  public function sendChangesOfFlightByOrder(Order $order, Flights $flight)
  {
    $data['file'] = $this->PDFService->generatePDFFromOrder($order);

    $data['flight'] = $order->flight;
    $data['flightOriginal'] = new Flights($flight->getOriginal());
    $data['subject'] = "Изменение на рейсе {$order->flight->flight}";

    foreach ($order->booking->tickets as $ticket) {
      $data['to'] = $ticket->email;

      $this->emailApp($data, self::EMAILS['CHANGED_FLIGHT']);
    }
  }

  public function sendChangesOfFlights(Flights $flight)
  {
    $flight->order->each(function (Order $order) use ($flight) {
      $this->sendChangesOfFlightByOrder($order, $flight);
    });
  }

  public function emailApp($data, $type = null)
  {
    switch ($type) {
      case self::EMAILS['CHANGED_FLIGHT']: {
          $message =  "Было:  {$this->getFieldsForEmailWithChanges($data['flightOriginal'])}";
          $message .= "Стало: {$this->getFieldsForEmailWithChanges($data['flight'])}";

          $message .= "<br>Новый билет во вложении! Если вам не подходит изменение(время и число) рейса, можете произвести вынужденный возврат без штрафа. для этого обратитесь по месту приобретения!
          ";

          $data['message'] = $message;

          return $this->emailClientTicketsSend($data);
        }
      default: {
          $data['subject'] = "Рейс {$data['flight']->flight}";
          $data['message'] = "<strong>Билеты на рейс {$data['flight']->getSummary()}</strong>";

          return $this->emailClientTicketsSend($data);
          // return Mail::send(
          //   new TicketMarkDown($data)
          // );
        }
    }
  }


  public function approveEmail(User $user)
  {
    $message = "Поздравляем с успешной регистрацией в InAvia.online!
    <br>
    Ваше имя пользователя :   {$user->email}<br>
    Ваш пароль :    {$user->not_hashed_password} <br>
    <br>
    С уважением,
    <br>
    InAvia.online
    <br>
    По техническим вопросам, просим писать на support@inavia.online";



    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $this->getSender();

    return mail($user->email, 'Успешная регистрация', $message, $headers);
  }

  public function getFieldsForEmailWithChanges(Flights $flight)
  {
    $message = $flight->getDate() . ' ' . $flight->getTime();
    $message .= " - " . $flight->getDateArrival() . ' ' . $flight->getTimeArrival() . " : ";
    $message .= $flight->getFrom() . " - " . $flight->getTo() . " : ";
    $message .= $flight->flight . "\n <br>";

    return $message;
  }

  public function emailClientTicketsSend($data)
  {
    // (A) EMAIL SETTINGS
    $mailTo = $data['to'];
    $mailSubject = $data['subject'];
    $mailMessage = $data['message'];
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
  }

  public function getSender()
  {
    return env('MAIL_FROM_ADDRESS');
  }
}
