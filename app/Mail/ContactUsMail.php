<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $firstname, $lastname, $email, $phone, $message;
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->firstname = $data["firstname"];
        $this->lastname = $data["lastname"];
        $this->email = $data["email"];
        $this->phone = $data["phone"];
        $this->message = $data["message"];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $name = $this->firstname . " " . $this->lastname;
        $fromAddress = new Address($this->email, $name);

        return new Envelope(
            from: $fromAddress,
            subject: 'Contact Us Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $data = [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message
        ];
        return new Content(
            markdown: 'emails.contactus',
            with: [
                'data' => $data
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
