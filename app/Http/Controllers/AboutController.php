<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AboutController extends Controller
{
    public null|object $category = null;

    public function index($category = null, $slug = null)
    {
        $this->getCategoryModel($category);

        // Apart from Njuvinky, all other pages here will be static
        // We handle Njuvinky in NjuvinkyController
        return $this->handleStaticResource();
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
}
