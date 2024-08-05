<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    private array $availableParameters = ['author'];
    private int $pagination = 15;

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
        $result = Book::where('authors', 'like', '%'.$query.'%')->paginate($this->pagination);

        if ($result->isEmpty()) {
            abort(404);
        }

        return Inertia::render('Books', [
            'books' => BookResource::collection($result),
            'category' => Category::where(['url' => 'vsetko', 'navigation_id' => 4])->firstOrFail(),
            'query' => $query
        ]);
    }
}
