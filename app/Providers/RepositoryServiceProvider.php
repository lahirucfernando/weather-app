<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TemperatureRepository;
use App\Repository\Contracts\TemperatureRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TemperatureRepositoryInterface::class, TemperatureRepository::class);
    }
}
