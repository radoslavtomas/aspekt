<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventExtResource;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Inertia\Inertia;
use Inertia\Response;

class EventsController extends Controller
{
    private int $pagination = 15;

    public function index($slug = null): Response
    {
        if ($slug) {
            return $this->handleSingleEvent($slug);
        }

        return $this->handleEventList();
    }

    private function handleSingleEvent(string $slug): Response
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        // dd($event);

        return Inertia::render('Event', [
            'event' => EventExtResource::make($event),
            'slug' => $slug
        ]);
    }

    private function handleEventList(): Response
    {
        $featured = Event::where('featured', 1)->orderBy('created_at', 'desc')->first();
        $events = Event::published()->language('sk')->orderBy('created_at', 'desc')->paginate($this->pagination);

        // remove featured event from the event list
        if ($featured) {
            $filtered = $events->filter(fn($event) => $featured->id !== $event->id);
            $events->setCollection(collect($filtered));
        } // if no featured event is set, make the first event featured
        else {
            $featured = $events->shift();
        }

        return Inertia::render('Events', [
            'events' => EventResource::collection($events),
            'featured' => EventResource::make($featured),
        ]);
    }
}
