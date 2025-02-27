<?php

namespace Innoboxrr\MakeBridge\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        
        // $this->mergeConfigFrom(__DIR__ . '/../../config/innoboxrrmakebridge.php', 'innoboxrrmakebridge');

    }

    public function boot()
    {
        
        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->loadViewsFrom(__DIR__.'/../../resources/views', 'innoboxrrmakebridge');

        if ($this->app->runningInConsole()) {
            
            // $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/innoboxrrmakebridge'),], 'views');

            // $this->publishes([__DIR__.'/../../config/innoboxrrmakebridge.php' => config_path('innoboxrrmakebridge.php')], 'config');

        }

    }
    
}