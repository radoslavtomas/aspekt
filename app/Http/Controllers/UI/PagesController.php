<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookExtResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use App\Models\Navigation;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PagesController extends Controller
{
    private $all = 'vsetko';
    private $pagination = 15;

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
        $category = $this->getCategoryModel($category);

        $data = $this->prepareBooksData($category, $slug);

        return Inertia::render('Books', $data);
    }

    protected function prepareBooksData($category, $slug): array
    {
        if ($category->isStatic()) {
            $page = null;
        } else {
            if($slug) {
                // single resource
                $book = BookExtResource::make(Book::where('slug', $slug)->firstOrFail());
            } else {
                // list of resources for given category
                if($category['url'] == $this->all) { // special category "vsetko"
                    $books = BookResource::collection(Book::published()->orderBy('created_at', 'desc')->paginate($this->pagination));
                } else { // all other categories
                    $books = BookResource::collection($category->books()->paginate($this->pagination));
                }
            }
        }

        // dd($book);

        return [
            'page' => $page ?? null,
            'book' => $book ?? null,
            'books' => $books ?? null,
            'category' => $category,
            'slug' => $slug
        ];
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

    private function getCategoryModel($category_url)
    {
        return Category::where('url', $category_url)->firstOrFail();
    }
}
