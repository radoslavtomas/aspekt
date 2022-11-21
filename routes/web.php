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
Route::get('/books/autorky-redaktorky-prekladatelky', ['App\Http\Controllers\BooksController', 'authors'])->name('authors');
Route::get('/books/{category?}/{slug?}', ['App\Http\Controllers\BooksController', 'index'])->name('books');
Route::get('/aspektin/{category?}/{slug?}', ['App\Http\Controllers\AspektinController', 'index'])->name('aspektin');
Route::get('/library/{category?}/{slug?}', ['App\Http\Controllers\UI\PagesController', 'library'])->name('library');
Route::get('/contact', ['App\Http\Controllers\UI\PagesController', 'contact'])->name('contact');
Route::get('/eshop/basket', ['App\Http\Controllers\EshopController', 'basket'])->name('basket');
Route::get('/eshop/shipping', ['App\Http\Controllers\EshopController', 'shipping'])->name('shipping');
Route::get('/eshop/summary', ['App\Http\Controllers\EshopController', 'summary'])->name('summary');
Route::get('/eshop/thank-you', ['App\Http\Controllers\EshopController', 'thankYou'])->name('thankYou');
Route::post('/eshop/create-order', ['App\Http\Controllers\EshopController', 'createOrder'])->name('createOrder');

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
