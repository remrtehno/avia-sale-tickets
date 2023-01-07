<?php

namespace App\Services;

use App\Models\Flights;
use App\Models\Order;
use Illuminate\Support\Facades\File;
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

  public function getFlightLogo(Flights $flight)
  {
    if (!$flight->getImages()->count()) {
      return '';
    }
    return File::get($flight->getImages()[0]?->getPath());
  }

  public function generatePDFFromOrder(Order $order)
  {
    $data['order'] = $order;
    $data['seller'] = $order->seller;
    $data['flight'] = $order->flight;
    $data["logo"] = $this->getFlightLogo($order->flight);
    $data['passengers'] = $order->booking->tickets;
    $data['returnRules'] = $order->flight->comment;

    return $this->generatePDF($data);
  }
}
