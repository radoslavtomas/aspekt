<?php

namespace App\Http\Controllers;

use App\Models\Order;
use http\Env\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Helpers\Sanitize;

class EshopController extends Controller
{
    private $sanitization;
    private $fields = [
        'primary_email' => 'email',
        'delivery_first_name' => 'string',
        'delivery_last_name' => 'string',
        'delivery_phone' => 'string',
        'delivery_company' => 'string',
        'delivery_street1' => 'string',
        'delivery_street2' => 'string',
        'delivery_city' => 'string',
        'delivery_postal_code' => 'string',
        'delivery_country' => 'int',
        'billing_first_name' => 'string',
        'billing_last_name' => 'string',
        'billing_company' => 'string',
        'billing_street1' => 'string',
        'billing_street2' => 'string',
        'billing_city' => 'string',
        'billing_postal_code' => 'string',
        'billing_country' => 'int',
        'show_billing_panel' => 'bool',
        'comment' => 'string',
    ];

    public function __construct()
    {
        $this->sanitization = new Sanitize();
    }

    public function basket()
    {
        return Inertia::render('Eshop/Basket');
    }

    public function shipping()
    {
        return Inertia::render('Eshop/Shipping');
    }

    public function summary()
    {
        return Inertia::render('Eshop/Summary');
    }

    public function thankYou()
    {
        return Inertia::render('Eshop/ThankYou');
    }

    public function createOrder(Request $request)
    {
        $customer = $this->prepareCustomerOrderData($request);
        $order = Order::create($customer);

        $basket = $request->get('basket');
        $formattedBasket = $this->getFormattedBasket($basket, $order->id);

        foreach ($formattedBasket as $item)
        {
            $order->items()->create($item);
        }

        return Inertia::render('Eshop/ThankYou');
    }

    private function prepareCustomerOrderData($request)
    {
        $customer = $request->get('customer');
        $basket = $request->get('basket');

        $customer = $this->sanitization->sanitize($customer, $this->fields);
        $customer['order_status_id'] = 'processing';
        $customer['order_total'] = $this->getOrderTotal($basket);
        $customer['product_count'] = count($basket);
        $customer['payment_method'] = '';
        $customer['currency'] = 'EUR';
        $customer['host'] = $request->ip();

        return $customer;
    }

    private function getOrderTotal($basket)
    {
        $total = 0;

        foreach ($basket as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return $total;
    }

    private function getFormattedBasket($basket, $orderId)
    {
        return array_map(fn($item) => [
            'order_id' => $orderId,
            'book_id' => $item['book_id'],
            'price' => $item['price'],
            'title' => $item['title'],
            'qty' => $item['qty'],
        ], $basket);
    }
}
