<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CurrencyRepositoryInterface;
use App\Services\CurrencyRepository;
use App\Services\CurrencyGenerator;

class CurrencyRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CurrencyRepositoryInterface::class, function () {
            return new CurrencyRepository(CurrencyGenerator::generate());
        });
    }
}
