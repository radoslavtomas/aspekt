<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        $featured_blogs = Blog::where('featured', 1)->orderBy('created_at', 'desc')->get()->take(3);

        if(count($featured_blogs) < 3)
        {
            $featured_blogs = Blog::published()->language('sk')->orderBy('created_at', 'desc')->get()->take(3);
        }
        // dd($featured_blogs);


        return Inertia::render('Home', [
            'blogs' => $featured_blogs
        ]);
    }
}
