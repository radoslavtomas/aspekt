<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class ContactController extends Controller
{
    public function contact()
    {
        return Inertia::render('Contact');
    }
}
