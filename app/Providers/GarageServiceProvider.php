<?php

namespace App\Providers;

use App\Http\Controllers\GarageController;
use App\Repositories\FilterChain\Provider;
use App\Services\Garage\GarageInterface;
use App\Services\Garage\Handler;
use Illuminate\Support\ServiceProvider;

class GarageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(GarageController::class)
            ->needs(GarageInterface::class)
            ->give(function () {
                return new Handler(new Provider());
            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
