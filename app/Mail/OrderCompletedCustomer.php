<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCompletedCustomer extends Mailable {

    use Queueable, SerializesModels;

    public array $basket;

    public string $orderTotal;

    public $postage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($basket, $orderTotal, $postage) {
        $this->basket = $basket;
        $this->orderTotal = number_format($orderTotal / 100, 2).' €';

        $this->postage = $postage ?
            number_format($postage / 100, 2).' €' :
            '3,10 € – 5,40 €';
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope() {
        return new Envelope(
            from: new Address('aspekt@aspekt.sk', 'ASPEKT'),
            subject: 'Objednávka vybavená: Aspektovské knihy sú na ceste k Vám',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content() {
        return new Content(
            view: 'emails.orders.Completed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments() {
        return [];
    }

}
