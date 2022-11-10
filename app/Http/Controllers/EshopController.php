<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EshopController extends Controller
{
    public function basket()
    {
        return Inertia::render('Basket');
    }

    public function shipping()
    {
        return Inertia::render('Shipping');
    }

    public function summary()
    {
        return Inertia::render('Summary');
    }
}
