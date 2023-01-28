<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogExtResource;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use MailchimpMarketing;

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
        $this->category = Category::where(['url' => $category_url, 'navigation_id' => 43])->firstOrFail();
    }

    private function handleSingleResource(string $slug): Response
    {
        $blog = BlogExtResource::make(Blog::with('files', 'downloads')->where('slug', $slug)->firstOrFail());
        // dd($blog);

        return Inertia::render('Njuvinka', [
            'blog' => $blog,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handleListResource(): Response
    {
        if ($this->category['url'] == 'vsetko') {
            $blogs = Blog::published()->where('blog_type_id', 43)->orderBy('created_at', 'desc')->paginate($this->pagination);
        } else { // all other categories
            $blogs = $this->category->blogs()->paginate($this->pagination);
        }

        $njuvinkyCategories = $this->getNjuvinkyCategories();

        return Inertia::render('Njuvinky', [
            'blogs' => BlogResource::collection($blogs),
            'category' => $this->category,
            'njuvinkyCategories' => $njuvinkyCategories,
        ]);
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'subscribe_email' => 'required|string|email'
        ]);

        $list_id = env('MAILCHIMP_LIST_ID');
        $mailchimp = new MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => env('MAILCHIMP_API_KEY'),
            'server' => env('MAILCHIMP_SERVER_PREFIX')
        ]);

        try {
            $response = $mailchimp->lists->addListMember($list_id, [
                "email_address" => $validated['subscribe_email'],
                "status" => "subscribed",
                "tags" => ["Knižnica Aspektu"]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to subscribe ' . $validated['subscribe_email'] . ' to Njuvinky newsletter');
            Log::error($e->getMessage());
            $response = null;
        }

        return [
            'accepted' => (bool)$response
        ];
    }

}
