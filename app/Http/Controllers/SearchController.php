<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\PageSearchResultResource;
use App\Http\Resources\PersonResource;
use App\Http\Resources\SearchResultResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Event;
use App\Models\Page;
use App\Models\People;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    private array $parameters = [
        'inline',
        'blogs',
        'books',
        'authors',
        'events',
        'pages',
        'njuvinky',
    ];
    private int $maxRecords = 300;
    private int $paginate = 35;
    private string $parameter;
    private string $query;

    public function index()
    {
        return Inertia::render('Search');
    }

    public function search($parameter)
    {
        $query = Request::get('query');

        if (!$query) {
            abort(404);
        }

        if (!isset($parameter, $this->parameters)) {
            abort(404);
        }

        $this->parameter = $parameter;
        $this->query = $query;

        return $this->$parameter();
    }

    private function blogs()
    {
        $blogs = Blog::published()
            ->where('blog_type_id', '<>', 43) // don't include njuvinky
            ->whereAny([
                'title',
                'subtitle',
                'authors',
                'authors_cite',
                'teaser',
                'body'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        return $this->displaySearchResults($blogs);
    }

    private function displaySearchResults($items)
    {
        return Inertia::render('SearchResult', [
            'items' => $items->isEmpty() ? null : SearchResultResource::collection($items),
            'query' => $this->query,
            'parameter' => $this->parameter,
        ]);
    }

    private function books()
    {
        $books = Book::published()
            ->whereAny([
                'title',
                'subtitle',
                'authors',
                'editors',
                'translation',
                'teaser',
                'body',
                'links'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        return $this->displaySearchResults($books);
    }

    private function authors()
    {
        $people = People::published()
            ->whereAny([
                'title',
                'teaser',
                'body',
                'links'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        return $this->displaySearchResults($people);
    }

    private function events()
    {
        $events = Event::published()
            ->whereAny([
                'title',
                'teaser',
                'body',
                'links'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        return $this->displaySearchResults($events);
    }

    private function pages()
    {
        $pages = Page::with('category', 'category.navigation')
            ->whereAny([
                'name_sk',
                'body_sk'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        // dd($pages);

        return Inertia::render('SearchResult', [
            'items' => $pages->isEmpty() ? null : PageSearchResultResource::collection($pages),
            'query' => $this->query,
            'parameter' => $this->parameter,
        ]);
    }

    private function inline()
    {
        $blogs = Blog::published()
            ->whereAny([
                'title',
                'subtitle',
                'authors',
                'authors_cite',
                'teaser',
                'body'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->take($this->maxRecords)
            ->get();

        $books = Book::published()
            ->whereAny([
                'title',
                'subtitle',
                'authors',
                'editors',
                'translation',
                'teaser',
                'body',
                'links'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->take($this->maxRecords)
            ->get();

        $people = People::published()
            ->whereAny([
                'title',
                'teaser',
                'body',
                'links'
            ], 'like', '%'.$this->query.'%')
            ->get();

        if ($people->count() > 1) {
            $people = $people->where('type_id', 0);
        }

        if ($books->isEmpty() && $blogs->isEmpty() && $people->isEmpty()) {
            abort(404);
        }

        return Inertia::render('SearchInline', [
            'blogs' => $blogs->isEmpty() ? null : BlogResource::collection($blogs),
            'books' => $books->isEmpty() ? null : BookResource::collection($books),
            'people' => $people->isEmpty() ? null : PersonResource::collection($people),
            'category' => Category::where(['url' => 'vsetko', 'navigation_id' => 4])->firstOrFail(),
            'query' => $this->query,
            'route_name' => $people->isEmpty() ? null : ($people->first()->type_id ? 'about' : 'books')
        ]);
    }

    private function njuvinky()
    {
        $blogs = Blog::published()
            ->where('blog_type_id', 43) // search only for njuvinky
            ->whereAny([
                'title',
                'subtitle',
                'authors',
                'authors_cite',
                'teaser',
                'body'
            ], 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate)->withQueryString();

        return $this->displaySearchResults($blogs);
    }
}
