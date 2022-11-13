<?php

namespace App\Http\Controllers;

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
        $customer = $request->get('customer');
        if($customer['am_i_joke_to_you']) {
            return response()->json([
                'nice_try' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'
            ]);
        }

        // dd($customer);
        $customer = $this->sanitization->sanitize($request->get('customer'), $this->fields);
        $customer['order_status_id'] = 'processing';
        $customer['order_total'] = 5;
        $customer['product_count'] = 2;
        $customer['payment_method'] = '';
        $customer['currency'] = 'EUR';
        $customer['host'] = $request->ip();
        dd($customer);
        return Inertia::render('Eshop/ThankYou');
    }
}
