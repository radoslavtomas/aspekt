<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EshopController extends Controller
{
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
}
