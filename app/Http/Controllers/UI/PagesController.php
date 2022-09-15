<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function home()
    {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function about()
    {
        return Inertia::render('About');
    }

    public function books()
    {
        return Inertia::render('Books');
    }

    public function aspektin()
    {
        return Inertia::render('AspektIn');
    }

    public function library()
    {
        return Inertia::render('Library');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }
}
