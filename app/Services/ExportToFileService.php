<?php

namespace App\Services;

use App\Models\Ticket;
use Illuminate\Support\Collection;

class ExportToFileService
{
  public $fieldsToSave;

  function __construct()
  {
    $this->fieldsToSave = collect(
      ['passport_number', 'citizenship', 'birthday', 'gender', 'passport_date', 'surname', 'name']
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
    return
      $this->fieldsToSave->reduce(function ($acc, $fieldToSave) use ($ticket) {
        $separator = $acc ? '/' : '';
        $fieldData = strtoupper($ticket[$fieldToSave]);

        return "$acc{$separator}{$fieldData}";
      }, '');
  }
}
