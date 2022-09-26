<?php

namespace App\Http\Middleware;

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
            'auth' => [
                '' . $this->str . '' => $request->user(),
            ],
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
        // return Category::all();
        return [
            [
                'name_sk' => 'Domov',
                'name_en' => 'Home',
                'route' => 'home',
                'url' => route('home'),
                'component' => 'Home',
                'items' => null,
            ],
            [
                'name_sk' => 'O Aspekte',
                'name_en' => 'About Aspekt',
                'route' => 'about',
                'url' => route('about'),
                'component' => 'About',
                'items' => [
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Čo je ASPEKT?',
                        'name_en' => 'What\'s ASPEKT?',
                        'position' => 1,
                        'url' => 'co-je-aspekt'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Projekty',
                        'name_en' => 'Projects',
                        'position' => 2,
                        'url' => 'projekty'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'História',
                        'name_en' => 'History',
                        'position' => 3,
                        'url' => 'historia'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Kto je kto',
                        'name_en' => 'Who\'s who',
                        'position' => 4,
                        'url' => 'kto-je-kto'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Archív ňjúvinky',
                        'name_en' => 'Njuvinky archive',
                        'position' => 5,
                        'url' => 'njuvinky'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Spolupráca',
                        'name_en' => 'Cooperation',
                        'position' => 6,
                        'url' => 'spolupraca'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Ďakujeme',
                        'name_en' => 'Thank you',
                        'position' => 7,
                        'url' => 'dakujeme'
                    ]
                ],
            ],
            [
                'name_sk' => 'Knižná edícia',
                'name_en' => 'Books',
                'route' => 'books',
                'url' => route('books'),
                'component' => 'Books',
                'items' => [
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Pripravujeme',
                        'name_en' => 'Edition plan',
                        'position' => 1,
                        'url' => 'pripravujeme'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Novinky',
                        'name_en' => 'New books',
                        'position' => 2,
                        'url' => 'novinky'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Beletria',
                        'name_en' => 'Fiction',
                        'position' => 3,
                        'url' => 'beletria'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Knihy pre deti a mládež',
                        'name_en' => 'Children\'s books',
                        'position' => 4,
                        'url' => 'pre-deti'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Spoločenskovedná literatúra',
                        'name_en' => 'Politics, philosophy & culture',
                        'position' => 5,
                        'url' => 'spolocenskovedna-literatura'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Zborníkový rad Aspekty',
                        'name_en' => 'Aspekty journal',
                        'position' => 6,
                        'url' => 'aspekty'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Zborníkový rad Čítanka',
                        'name_en' => 'Reader\'s digest',
                        'position' => 7,
                        'url' => 'citanka'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Rozhovory Aspektu',
                        'name_en' => 'Aspekt interviews',
                        'position' => 8,
                        'url' => 'rozhovory'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Výber textov ASPEKTin',
                        'name_en' => 'ASPEKTin reader\'s digest',
                        'position' => 9,
                        'url' => 'aspektin-vyber'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Časopis Aspekt',
                        'name_en' => 'Aspekt magazine',
                        'position' => 10,
                        'url' => 'casopis-aspekt'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Kalendárky',
                        'name_en' => 'Aspekt calendars',
                        'position' => 11,
                        'url' => 'kalendarky'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'E-knihy',
                        'name_en' => 'E-books',
                        'position' => 12,
                        'url' => 'e-knihy'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Autorky, redaktorky, prekladateľky',
                        'name_en' => 'Authors, editors, translators',
                        'position' => 13,
                        'url' => 'autorky'
                    ],
                ],
            ],
            [
                'name_sk' => 'AspektIn',
                'name_en' => 'AspektIn',
                'route' => 'aspektin',
                'url' => route('aspektin'),
                'component' => 'AspektIn',
                'items' => [
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Kalendárka',
                        'name_en' => 'Aspekt calendar',
                        'position' => 1,
                        'url' => 'kalendarka'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Správy nové',
                        'name_en' => 'News',
                        'position' => 2,
                        'url' => 'spravy-nove'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Poznámky krátke',
                        'name_en' => 'Short notes',
                        'position' => 3,
                        'url' => 'poznamky-kratke'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Knižky aspektovské',
                        'name_en' => 'Aspekt books',
                        'position' => 4,
                        'url' => 'knizky-aspektovske'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Knižky ostatné',
                        'name_en' => 'Other books',
                        'position' => 5,
                        'url' => 'knizky-ostatne'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Rozhovory všetečné',
                        'name_en' => 'Interviews',
                        'position' => 6,
                        'url' => 'rozhovory'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Umenia všelijaké',
                        'name_en' => 'Arts',
                        'position' => 7,
                        'url' => 'umenia'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Texty krásne',
                        'name_en' => 'Beautiful texts',
                        'position' => 7,
                        'url' => 'texty-krasne'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Texty múdre',
                        'name_en' => 'Wise texts',
                        'position' => 7,
                        'url' => 'texty-mudre'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Tiráž ASPEKTin',
                        'name_en' => 'ASPEKTin imprint',
                        'position' => 7,
                        'url' => 'tiraz'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Pokyny pre autorky a autorov',
                        'name_en' => 'Rules for contributors',
                        'position' => 7,
                        'url' => 'pokyny'
                    ],
                ],
            ],
            [
                'name_sk' => 'Knižnica',
                'name_en' => 'Library',
                'route' => 'library',
                'url' => route('library'),
                'component' => 'Library',
                'items' => [
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'O knižnici ASPEKTU',
                        'name_en' => 'About library',
                        'position' => 1,
                        'url' => 'o-kniznici'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Kedy a kde',
                        'name_en' => 'When and where',
                        'position' => 2,
                        'url' => 'kedy-kde'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Aktuality knižnice',
                        'name_en' => 'Library news',
                        'position' => 3,
                        'url' => 'aktuality'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'Knižničný poriadok',
                        'name_en' => 'Library rules',
                        'position' => 4,
                        'url' => 'kniznicny-poriadok'
                    ],
                    [
                        'is_dynamic' => true,
                        'page_id' => null,
                        'name_sk' => 'On-line katalóg',
                        'name_en' => 'On-line inventory',
                        'position' => 5,
                        'url' => 'katalog'
                    ],
                ],
            ],
            [
                'name_sk' => 'Kontakt',
                'name_en' => 'Contact',
                'route' => 'contact',
                'url' => route('contact'),
                'component' => 'Contact',
                'items' => null,
            ],
        ];
    }
}
