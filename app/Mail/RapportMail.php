<?php

namespace App\Mail;



use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RapportMail extends Mailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rapport)
    {
        $this->rapport = $rapport;

        $this->connection = 'database';
        $this->pdf = base64_encode(PDF::loadView('emails.pdf', compact('rapport'))->output());

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('test@test.com', 'Accessibility'),
            subject: 'Rapport Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {

        return [
            Attachment::fromData(fn () =>  base64_decode($this->pdf), 'Rapport.pdf')
                ->withMime('application/pdf'),
        ];
    }


}
