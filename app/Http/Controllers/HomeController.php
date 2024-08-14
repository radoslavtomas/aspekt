<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\EventResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Event;
use Inertia\Inertia;
use MailchimpMarketing;

class HomeController extends Controller
{
    public $amountToTake = 4;

    public function home()
    {
        // blogs
        $featured_blogs = BlogResource::collection(Blog::where('featured', 1)->orderBy('created_at',
            'desc')->get()->take($this->amountToTake));

        if (count($featured_blogs) < $this->amountToTake) {
            $featured_blogs = BlogResource::collection(Blog::published()->language('sk')->orderBy('created_at',
                'desc')->get()->take($this->amountToTake));
        }

        // books
        $featured_books = BookResource::collection(Book::where('featured', 1)->orderBy('created_at',
            'desc')->get()->take($this->amountToTake));

        if (count($featured_books) < $this->amountToTake) {
            $featured_books = BookResource::collection(Book::published()->language('sk')->orderBy('created_at',
                'desc')->get()->take($this->amountToTake));
        }

        // events
        $featured_events = EventResource::collection(Event::where('home_page', 1)->orderBy('created_at',
            'desc')->get()->take($this->amountToTake));

        if (!count($featured_events)) {
            $featured_events = null;
        }

        // dd($featured_books);


        return Inertia::render('Home', [
            'blogs' => $featured_blogs,
            'books' => $featured_books,
            'events' => $featured_events,
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


        // Iné kontakty
        // Knižnica Aspektu
        // Knižnice v SR
        // Médiá
        // MVO
        // Vysoké školy SR a ČR

        $response = $mailchimp->lists->tagSearch($list_id);
//        $response = $mailchimp->lists->getListMember($list_id, md5('radoslav.tomas@protonmail.com'));
//        $response = $mailchimp->lists->deleteListMemberPermanent($list_id, md5('radoslav.tomas@hotmail.co.uk'));
//        $response = $mailchimp->lists->addListMember($list_id, [
//                "email_address" => "radoslav.tomas@protonmail.com",
//                "status" => "subscribed",
//                "tags" => ["Iné kontakty", "Knižnica Aspektu"]
//            ]);
        dd($response);
    }
}
