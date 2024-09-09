<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Http\Resources\PersonResource;
use App\Models\Category;
use App\Models\People;
use Inertia\Inertia;
use Inertia\Response;

class PeopleController extends Controller
{
    public null|object $category = null;
    private int $pagination = 15;

    public function authors($slug = null)
    {
        $this->getCategoryModel('autorky-redaktorky-prekladatelky');

        if ($slug) {
            return $this->handleSinglePersonResource($slug, 0);
        }

        return $this->handlePeopleResource(0);
    }

    private function getCategoryModel($category_url)
    {
        $this->category = Category::where('url', $category_url)->firstOrFail();
    }

    private function handleSinglePersonResource(string $slug, int $type_id): Response
    {
        $person = PersonResource::make(People::where('slug', $slug)->firstOrFail());

        return Inertia::render('Person', [
            'person' => $person,
            'category' => $this->category,
            'slug' => $slug,
            'route_name' => $type_id ? 'about' : 'books'
        ]);
    }

    private function handlePeopleResource($type_id): Response
    {
        $people = PeopleResource::collection(People::where([
            'published' => 1,
            'type_id' => $type_id
        ])->orderBy('created_at', 'asc')->paginate($this->pagination));


        return Inertia::render('People', [
            'people' => $people,
            'category' => $this->category,
            'route_name' => $type_id ? 'about' : 'books'
        ]);
    }

    public function people($slug = null)
    {
        $this->getCategoryModel('kto-je-kto');

        if ($slug) {
            return $this->handleSinglePersonResource($slug, 1);
        }

        return $this->handlePeopleResource(1);
    }
}
