<?php

namespace App\Http\Middleware;

use App\Models\Navigation;
use App\Models\Setting;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

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
            'auth' => [
                'user' => $request->user(),
            ],
            'translations' => function () {
                return $this->getTranslations();
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
            },
            'settings' => function () {
                return $this->getSettings();
            }
        ]);
    }

    private function getTranslations(): array
    {
        return Cache::rememberForever('translations', function () {
            $lang = Translation::all();
            return [
                'sk' => $this->getTranslationsByLang('sk', $lang),
                'en' => $this->getTranslationsByLang('en', $lang),
            ];
        });
    }

    private function getTranslationsByLang($lang, $translations): array
    {
        $data = [];

        foreach ($translations as $value) {
            $data[$value['key']] = $value[$lang];
        }

        return $data;
    }

    private function getNavigationItems()
    {
        return Cache::rememberForever('navigation', function () {
            return Navigation::with('categories')->orderBy('position')->get();
        });
    }

    private function getSettings()
    {
        return Cache::rememberForever('settings', function () {
            return $this->getSettingsAsKeyValuePairs(Setting::where('active', 1)->get());
        });
    }

    private function getSettingsAsKeyValuePairs($settings): array
    {
        $data = [];

        foreach ($settings as $item) {
            $data[$item['key']] = $item['value'];
        }

        return $data;
    }
}
