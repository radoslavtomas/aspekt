<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LibraryController extends Controller
{
    public null|object $category = null;
    private int $pagination = 15;

    public function index($category = null, $slug = null)
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
            'page' => $page,
            'category' => $this->category,
            'breadcrumbs_id' => 'library'
        ]);
    }

    private function handleSingleResource(string $slug): Response
    {
        $blog = BlogExtResource::make(Blog::with('files', 'downloads')->where('slug', $slug)->firstOrFail());
        // dd($blog);

        return Inertia::render('LibraryNews', [
            'blog' => $blog,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handleListResource(): Response
    {
        $blogs = Blog::published()->where('blog_type_id', 6)->orderBy('created_at', 'desc')->paginate($this->pagination);

        return Inertia::render('Library', [
            'blogs' => BlogResource::collection($blogs),
            'category' => $this->category,
        ]);
    }
}
