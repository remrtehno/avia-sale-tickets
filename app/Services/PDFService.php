<?php

namespace App\Services;

use PDF;

class PDFService
{
  public function makePDF($data = [])
  {
    return PDF::setOptions(['dpi' => 130])->loadView('emails.tickets.ticket-pdf', $data);
  }

  public function generatePDF($data = [])
  {
    return $this->makePDF($data)->output();
  }
}
