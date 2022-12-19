<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class NjuvinkyController extends Controller
{
    public null|object $category = null;
    private int $pagination = 15;

    public function redirect()
    {
        $latestCategory = $this->getNjuvinkyCategories()->first();
        return redirect()->route('njuvinky', $latestCategory->url);
    }

    private function getNjuvinkyCategories()
    {
        return Category::where('navigation_id', 43)->orderBy('id', 'desc');
    }

    public function index($category = null, $slug = null)
    {
        $this->getCategoryModel($category);

        if ($slug) {
            return $this->handleSingleResource($slug);
        }

        return $this->handleListResource();
    }

    private function getCategoryModel($category_url)
    {
        $this->category = Category::where('url', $category_url)->firstOrFail();
    }

    private function handleSingleResource(string $slug): Response
    {
        $blog = BlogExtResource::make(Blog::with('files', 'downloads')->where('slug', $slug)->firstOrFail());
        // dd($blog);

        return Inertia::render('Blog', [
            'blog' => $blog,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handleListResource(): Response
    {
        if ($this->category['url'] == 'vsetko') {
            $blogs = Blog::published()->language('sk')->orderBy('created_at', 'desc')->paginate($this->pagination);
        } else { // all other categories
            $blogs = $this->category->blogs()->whereIn('language', ['sk', ''])->paginate($this->pagination);
        }

        $njuvinkyCategories = $this->getNjuvinkyCategories();

        return Inertia::render('Njuvinky', [
            'blogs' => BlogResource::collection($blogs),
            'category' => $this->category,
            'njuvinkyCategories' => $njuvinkyCategories,
        ]);
    }

}
