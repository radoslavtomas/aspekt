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

Route::get('/about/kto-je-kto/{slug?}', [App\Http\Controllers\PeopleController::class, 'people'])->name('people');
Route::get('/books/autorky-redaktorky-prekladatelky/{slug?}',
    [App\Http\Controllers\PeopleController::class, 'authors'])->name('authors');
Route::get('/about/njuvinky/', [App\Http\Controllers\NjuvinkyController::class, 'redirect'])->name('njuvinky.redirect');
Route::post('/njuvinky/subscribe',
    [App\Http\Controllers\NjuvinkyController::class, 'subscribe'])->name('njuvinky.subscribe');

Route::get('/ochrana-osobnych-udajov', [App\Http\Controllers\MiscellaneousController::class, 'gdpr'])->name('gdpr');

Route::get('/about/{category?}/{slug?}', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/books/{category?}/{slug?}', [App\Http\Controllers\BooksController::class, 'index'])->name('books');
Route::get('/aspektin/{category?}/{slug?}',
    [App\Http\Controllers\AspektinController::class, 'index'])->name('aspektin');
Route::get('/library/{category?}/{slug?}', [App\Http\Controllers\LibraryController::class, 'index'])->name('library');
Route::get('/events/{slug?}', [App\Http\Controllers\EventsController::class, 'index'])->name('events');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::get('/njuvinky/{category?}/{slug?}',
    [App\Http\Controllers\NjuvinkyController::class, 'index'])->name('njuvinky');
Route::get('/eshop/basket', [App\Http\Controllers\EshopController::class, 'basket'])->name('basket');
Route::get('/eshop/shipping', [App\Http\Controllers\EshopController::class, 'shipping'])->name('shipping');
Route::get('/eshop/summary', [App\Http\Controllers\EshopController::class, 'summary'])->name('summary');
Route::get('/eshop/thank-you', [App\Http\Controllers\EshopController::class, 'thankYou'])->name('thankYou');
Route::post('/eshop/create-order', [App\Http\Controllers\EshopController::class, 'createOrder'])->name('createOrder');

Route::get('/search/{parameter}', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');

Route::get('/mailables', function () {
    Mail::to('radoslav.tomas@gmail.com')->send(new OrderCreatedCustomer());
    return 'done';
});

Route::get('/mailchimp', [App\Http\Controllers\HomeController::class, 'mailchimp']);

Route::get('/mailables/test', function () {
    return view('emails.orders.CreatedCustomer');
});

Route::get('/clear-cache', function () {
    \Illuminate\Support\Facades\Cache::flush();
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
