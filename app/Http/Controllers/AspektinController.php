<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AspektinController extends Controller
{
    public null|object $category = null;
    private string $all = 'vsetko';
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
            'breadcrumbs_id' => 'aspektin'
        ]);
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
        if($this->category['url'] == $this->all) { // special category "vsetko"
            $blogs = BlogResource::collection(Blog::published()->orderBy('created_at', 'desc')->paginate($this->pagination));
        } else { // all other categories
            $blogs = BlogResource::collection($this->category->blogs()->paginate($this->pagination));
        }

        return Inertia::render('Blogs', [
            'blogs' => $blogs,
            'category' => $this->category
        ]);
    }
}
