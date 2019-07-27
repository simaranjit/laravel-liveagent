<?php

namespace MacsiDigital\LiveAgent\Providers;

use Illuminate\Support\ServiceProvider;

class LiveAgentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('liveagent.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'liveagent');

        // Register the main class to use with the facade
        $this->app->singleton('liveagent', 'MacsiDigital\LiveAgent\LiveAgent');
        $this->app->bind('MacsiDigital\LiveAgent\Contracts\LiveAgent', 'MacsiDigital\LiveAgent\LiveAgent');
    }
}
