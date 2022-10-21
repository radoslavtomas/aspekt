<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookExtResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BooksController extends Controller
{
    public null|object $category = null;
    private string $all = 'vsetko';
    private int $pagination = 15;

    public function books($category = null, $slug = null)
    {
        $this->getCategoryModel($category);

        if ($this->category->isStatic()) {
            return $this->handleStaticResource();
        }

        if($slug) {
            return $this->handleSingleResource($slug);
        }

        return $this->handleListResource();
    }

    private function getCategoryModel($category_url)
    {
        $this->category = Category::where('url', $category_url)->firstOrFail();
    }

    private function handleStaticResource()
    {
        $page = $this->category->page;

        if (!$page) {
            abort(404);
        }

        return Inertia::render('Page', [
            'page' => $page
        ]);
    }

    private function handleSingleResource(string $slug): Response
    {
        $book = BookExtResource::make(Book::with('files', 'downloads')->where('slug', $slug)->firstOrFail());

        return Inertia::render('Book', [
            'book' => $book,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handleListResource(): Response
    {
        if($this->category['url'] == $this->all) { // special category "vsetko"
            $books = BookResource::collection(Book::published()->orderBy('created_at', 'desc')->paginate($this->pagination));
        } else { // all other categories
            $books = BookResource::collection($this->category->books()->paginate($this->pagination));
        }

        return Inertia::render('Books', [
            'books' => $books,
            'category' => $this->category
        ]);
    }
}
