<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreatedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $customerEmail;

    public $customerName;
    public $orderId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerEmail, $customerName, $orderId)
    {
        $this->customerEmail = $customerEmail;
        $this->customerName = $customerName;
        $this->orderId = $orderId;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->customerEmail, $this->customerName),
            subject: 'Nova objednavka na ASPEKT.sk',
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
            markdown: 'emails.orders.CreatedAdmin',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
