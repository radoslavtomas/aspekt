<?php

use App\Mail\OrderCreatedCustomer;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', ['App\Http\Controllers\HomeController', 'home'])->name('home');

Route::get('/about/kto-je-kto/{slug?}', ['App\Http\Controllers\PeopleController', 'people'])->name('people');
Route::get('/books/autorky-redaktorky-prekladatelky/{slug?}', ['App\Http\Controllers\PeopleController', 'authors'])->name('authors');
Route::get('/about/njuvinky/', ['App\Http\Controllers\NjuvinkyController', 'redirect'])->name('njuvinky.redirect');
Route::post('/njuvinky/subscribe', ['App\Http\Controllers\NjuvinkyController', 'subscribe'])->name('njuvinky.subscribe');

Route::get('/about/{category?}/{slug?}', ['App\Http\Controllers\AboutController', 'index'])->name('about');
Route::get('/books/{category?}/{slug?}', ['App\Http\Controllers\BooksController', 'index'])->name('books');
Route::get('/aspektin/{category?}/{slug?}', ['App\Http\Controllers\AspektinController', 'index'])->name('aspektin');
Route::get('/library/{category?}/{slug?}', ['App\Http\Controllers\LibraryController', 'index'])->name('library');
Route::get('/contact', ['App\Http\Controllers\UI\PagesController', 'contact'])->name('contact');
Route::get('/njuvinky/{category?}/{slug?}', ['App\Http\Controllers\NjuvinkyController', 'index'])->name('njuvinky');
Route::get('/eshop/basket', ['App\Http\Controllers\EshopController', 'basket'])->name('basket');
Route::get('/eshop/shipping', ['App\Http\Controllers\EshopController', 'shipping'])->name('shipping');
Route::get('/eshop/summary', ['App\Http\Controllers\EshopController', 'summary'])->name('summary');
Route::get('/eshop/thank-you', ['App\Http\Controllers\EshopController', 'thankYou'])->name('thankYou');
Route::post('/eshop/create-order', ['App\Http\Controllers\EshopController', 'createOrder'])->name('createOrder');

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');

Route::get('/mailables', function () {
    Mail::to('radoslav.tomas@gmail.com')->send(new OrderCreatedCustomer());
    return 'done';
});

Route::get('/mailchimp', ['App\Http\Controllers\HomeController', 'mailchimp']);

Route::get('/mailables/test', function () {
    return view('emails.orders.CreatedCustomer');
});

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
