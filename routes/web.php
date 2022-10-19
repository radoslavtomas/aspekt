<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['App\Http\Controllers\UI\PagesController', 'home'])->name('home');
Route::get('/about/{category?}/{slug?}', ['App\Http\Controllers\UI\PagesController', 'about'])->name('about');
Route::get('/books/{category?}/{slug?}', ['App\Http\Controllers\BooksController', 'books'])->name('books');
Route::get('/aspektin/{category?}/{slug?}', ['App\Http\Controllers\UI\PagesController', 'aspektin'])->name('aspektin');
Route::get('/library/{category?}/{slug?}', ['App\Http\Controllers\UI\PagesController', 'library'])->name('library');
Route::get('/contact', ['App\Http\Controllers\UI\PagesController', 'contact'])->name('contact');

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
