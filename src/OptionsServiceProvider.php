<?php

namespace EikeGrundke\Options;

use Illuminate\Support\ServiceProvider;

class OptionsServiceProvider extends ServiceProvider
{
    protected $options;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations/tenant'),
            ], 'migrations');

            $this->commands([
                \EikeGrundke\Options\Console\OptionSetCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('option', \EikeGrundke\Options\Option::class);
    }
}
