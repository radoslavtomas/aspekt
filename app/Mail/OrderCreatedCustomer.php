<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class OrderCreatedCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $basket;
    public $orderTotal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($basket, $orderTotal)
    {
        $this->basket = $basket;
        $this->orderTotal = $orderTotal / 100 . '€';
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('eshop@aspekt.sk', 'Aspekt Eshop'),
            subject: 'Objednavka z ASPEKT.sk',
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
            view: 'emails.orders.CreatedCustomer',
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
