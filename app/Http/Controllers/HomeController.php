<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\BookResource;
use App\Models\Blog;
use App\Models\Book;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use MailchimpMarketing;

class HomeController extends Controller
{
    public $amountToTake = 4;

    public function home()
    {
        // blogs
        $featured_blogs = BlogResource::collection(Blog::where('featured', 1)->orderBy('created_at', 'desc')->get()->take($this->amountToTake));

        if(count($featured_blogs) < $this->amountToTake)
        {
            $featured_blogs = BlogResource::collection(Blog::published()->language('sk')->orderBy('created_at', 'desc')->get()->take($this->amountToTake));
        }

        // books
        $featured_books = BookResource::collection(Book::where('featured', 1)->orderBy('created_at', 'desc')->get()->take($this->amountToTake));

        if(count($featured_books) < $this->amountToTake)
        {
            $featured_books = BookResource::collection(Book::published()->language('sk')->orderBy('created_at', 'desc')->get()->take($this->amountToTake));
        }

        // dd($featured_books);



        return Inertia::render('Home', [
            'blogs' => $featured_blogs,
            'books' => $featured_books,
        ]);
    }

    public function mailchimp()
    {
        $list_id = env('MAILCHIMP_LIST_ID');
        $mailchimp = new MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => env('MAILCHIMP_API_KEY'),
            'server' => env('MAILCHIMP_SERVER_PREFIX')
        ]);

        $response = $mailchimp->lists->tagSearch($list_id);
        dd($response);
    }
}
