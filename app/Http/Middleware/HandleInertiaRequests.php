<?php

namespace App\Http\Middleware;

use App\Http\Resources\TranslationResource;
use App\Models\Navigation;
use App\Models\Translation;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use App\Models\Category;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';
    private $str;

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $this->str = 'user';
        return array_merge(parent::share($request), [
            'translations' => function () {
                return TranslationResource::collection(Translation::all());
            },
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'locale' => function () {
                return app()->getLocale();
            },
            'navigation' => function () {
                return $this->getNavigationItems();
            }
        ]);
    }

    private function getNavigationItems() {
        return Navigation::with('categories')->orderBy('position')->get();
//        return Navigation::with('categories')->orderBy('position')->get()->filter(function($value, $key) {
//            return $value['id'] != 43;
//        });
    }
}
