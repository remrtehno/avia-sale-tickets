<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ExportToFileService
{
  public $fieldsToSave;

  function __construct()
  {
    $this->fieldsToSave = collect(
      ['passport_number', 'citizenship', User::BIRTHDAY, 'gender', User::PASSPORT_DATE, 'surname', 'name']
    );
  }

  public function prepareData(Collection $tickets)
  {
    return $tickets->reduce(function ($acc, Ticket $ticket) {
      return "$acc{$this->extractDataFromPerTicket($ticket)}\n";
    }, '');
  }

  public function extractDataFromPerTicket(Ticket $ticket)
  {
    $ticket[User::BIRTHDAY] = $this->formatDate($ticket[User::BIRTHDAY]);
    $ticket[User::PASSPORT_DATE] = $this->formatDate($ticket[User::PASSPORT_DATE]);

    return
      $this->fieldsToSave->reduce(function ($acc, $fieldToSave) use ($ticket) {
        $separator = $acc ? '/' : '';
        $fieldData = strtoupper($ticket[$fieldToSave]);

        return "$acc{$separator}{$fieldData}";
      }, '');
  }


  public function formatDate($timestamp)
  {
    $instance = new Carbon($timestamp);
    return $instance->format('dMY');
  }
}
