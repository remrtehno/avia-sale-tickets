<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMarkDown extends Mailable
//implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->attachData($this->data['file'], now() . ' tickets.pdf', [
                'mime' => 'pdf'
            ])
            ->subject($this->data['subject'])
            ->to($this->data['to'])
            ->from($this->data['from'])
            ->markdown('emails.tickets.tickets');
    }
}
