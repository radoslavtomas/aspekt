<?php

namespace App\Providers;

use App\Services\NewsfilterService;
use App\Services\SenderNewsfilterService;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container bindings that should be registered.
     *
     * @var array
     */
    public array $bindings = [
        NewsfilterService::class => SenderNewsfilterService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    env('LOG_VIEWER_USER', 'radoslav.tomas@gmail.com'),
                ]);
        });
    }
}
