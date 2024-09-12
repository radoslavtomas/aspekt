<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
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
        // dd($this->category);

        if ($this->category->isStatic()) {
            return $this->handleStaticResource();
        }

        if ($slug) {
            return $this->handleSingleResource($slug);
        }

        return $this->handleListResource();
    }

    private function getCategoryModel($category_url)
    {
        $this->category = Category::where(['url' => $category_url, 'navigation_id' => 5])->firstOrFail();
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
        $blog = BlogExtResource::make(Blog::published()->with('files', 'downloads')->where('slug',
            $slug)->firstOrFail());

        if (!$blog) {
            abort(404);
        }

        return Inertia::render('Blog', [
            'blog' => $blog,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handleListResource(): Response
    {
        if ($this->category['url'] == $this->all) { // special category "vsetko"
            $featured = Blog::where('featured', 1)->orderBy('created_at', 'desc')->first();
            $blogs = Blog::published()->language('sk')->orderBy('created_at', 'desc')->paginate($this->pagination);
        } else { // all other categories
            $featured = $this->category->blogs->sortByDesc('created_at')->where('featured', 1)->first();
            $blogs = $this->category->blogs()->whereIn('language', ['sk', ''])->paginate($this->pagination);
        }

        if ($featured) { // filter out $featured
            $filtered = $blogs->filter(fn($blog) => $featured->id !== $blog->id);
            $blogs->setCollection(collect($filtered));
        } else { // if $featured is not set, make first blog $featured
            $featured = $blogs->shift();
        }

        return Inertia::render('Blogs', [
            'blogs' => BlogResource::collection($blogs),
            'category' => $this->category,
            'featured' => BlogResource::make($featured),
        ]);
    }
}
