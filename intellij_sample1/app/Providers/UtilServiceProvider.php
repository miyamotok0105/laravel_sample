<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Infrastructure\Repositories\IRepositories\IGreetDicRepositorys;
use App\Infrastructure\Repositories\GreetDicRepositorys;

class UtilServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('greetService', 'app\Service\GreetService');

        // $this->app->singleton(IGreetDicRepositorys::class, GreetDicRepositorys::class);

        $this->app->bind(
            IGreetDicRepositorys::class,
            GreetDicRepositorys::class
        );
    }
}
