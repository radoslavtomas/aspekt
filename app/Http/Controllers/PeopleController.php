<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Http\Resources\PersonResource;
use App\Models\Category;
use App\Models\People;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PeopleController extends Controller
{
    public null|object $category = null;
    private int $pagination = 15;

    public function authors($slug = null)
    {
        $this->getCategoryModel('autorky-redaktorky-prekladatelky');

        if($slug) {
            return $this->handleSinglePersonResource($slug);
        }

        return $this->handlePeopleResource();
    }

    private function getCategoryModel($category_url)
    {
        $this->category = Category::where('url', $category_url)->firstOrFail();
    }

    private function handleSinglePersonResource(string $slug): Response
    {
        $person = PersonResource::make(People::where('slug', $slug)->firstOrFail());

        return Inertia::render('Person', [
            'person' => $person,
            'category' => $this->category,
            'slug' => $slug
        ]);
    }

    private function handlePeopleResource(): Response
    {
        $people = PeopleResource::collection(People::where(['published' => 1, 'type_id' => 0])->orderBy('created_at', 'desc')->paginate($this->pagination));


        return Inertia::render('People', [
            'people' => $people,
            'category' => $this->category
        ]);
    }
}
