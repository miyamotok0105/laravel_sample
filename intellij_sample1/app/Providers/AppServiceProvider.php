<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\MonsterService');

        $this->app->bind(
            \App\Infrastructure\Repositories\MonsterRepositoryInterface::class,
            \App\Infrastructure\Repositories\MonsterRepository::class
        );
    }
}
