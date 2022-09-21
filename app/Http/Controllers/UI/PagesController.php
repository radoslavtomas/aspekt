<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
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

    public function about($category = null, $slug = null)
    {
        return Inertia::render('About', [
            'category' => $category,
            'slug' => $slug
        ]);
    }

    public function books($category = null, $slug = null)
    {
        // dd(BookResource::collection(Book::where('published', 1)->orderBy('created_at', 'desc')->paginate(10)));
        return Inertia::render('Books', [
            'books' => BookResource::collection(Book::where('published', 1)->orderBy('created_at', 'desc')->paginate(10)),
            'category' => $category,
            'slug' => $slug
        ]);
    }

    public function aspektin($category = null, $slug = null)
    {
        return Inertia::render('AspektIn', [
            'category' => $category,
            'slug' => $slug
        ]);
    }

    public function library($category = null, $slug = null)
    {
        return Inertia::render('Library', [
            'category' => $category,
            'slug' => $slug
        ]);
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }
}
