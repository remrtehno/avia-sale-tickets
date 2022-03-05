<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\Flights;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class TicketService
{
  public function createTicket(Ticket $ticket, Flights $flights)
  {
  }

  public function exportCSV($table)
  {
    $filename = "tweets.csv";
    $handle = fopen($filename, 'w+');

    $fields = [
      'name',
      'surname',
      'surname2',
      'email',
      'birthday',
      'gender',
      'passport_date',
      'passport_number',
      'citizenship',
      'tel',
      'visa',
      'address',
      'type',
      'price',
      'status'
    ];

    foreach ($table as $row) {
      $data = [];

      foreach ($fields as $field) {
        $data[] = $row[$field];
      }

      fputcsv(
        $handle,
        $data
      );
    }

    fclose($handle);

    $headers = [
      'Content-Type' => 'text/csv',
    ];


    $today = now()->isoFormat('L');

    return Response::download($filename, "$today tickets.csv", $headers);
  }
}
