<?php

namespace SethSharp\OddsApi;

use Illuminate\Support\ServiceProvider;

class OddsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/odds-api.php' => config_path('odds-api.php')
        ], 'odds-api-config');
    }
}