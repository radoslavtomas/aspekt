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
}
