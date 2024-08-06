<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\PersonResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\People;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    private array $availableParameters = ['author'];
    private int $maxRecords = 100;

    public function search($parameter)
    {
        $query = Request::get('query');

        if (!$query) {
            abort(404);
        }

        if (!in_array($parameter, $this->availableParameters)) {
            abort(404);
        }

        return $this->$parameter($query);
    }

    private function author($query)
    {
        $blogs = Blog::published()
            ->where('authors', 'like', '%'.$query.'%')
            ->orWhere('title', 'like', '%'.$query.'%')
            ->orderBy('created_at', 'desc')
//            ->paginate(5, ['*'], 'booksPage');
            ->take($this->maxRecords)
            ->get();

        $books = Book::published()
            ->where('authors', 'like', '%'.$query.'%')
            ->orderBy('created_at', 'desc')
//            ->paginate(5, ['*'], 'blogsPage');
            ->take($this->maxRecords)
            ->get();

        $people = People::published()
            ->where('title', 'like', '%'.$query.'%')
            ->get();

        if ($people->count() > 1) {
            $people = $people->where('type_id', 0);
        }

        if ($books->isEmpty() && $blogs->isEmpty() && $people->isEmpty()) {
            abort(404);
        }

        return Inertia::render('Search', [
            'blogs' => $blogs->isEmpty() ? null : BlogResource::collection($blogs),
            'books' => $books->isEmpty() ? null : BookResource::collection($books),
            'people' => $people->isEmpty() ? null : PersonResource::collection($people),
            'category' => Category::where(['url' => 'vsetko', 'navigation_id' => 4])->firstOrFail(),
            'query' => $query,
            'route_name' => $people->isEmpty() ? null : ($people->first()->type_id ? 'about' : 'books')
        ]);
    }
}
