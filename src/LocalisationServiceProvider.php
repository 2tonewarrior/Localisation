<?php

namespace LaravelEnso\Localisation;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\Localisation\Commands\Generate;
use LaravelEnso\Localisation\Commands\Scan;
use LaravelEnso\Localisation\Commands\Sync;
use LaravelEnso\Localisation\Http\Middleware\SetLanguage;

class LocalisationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Generate::class,
                Scan::class,
                Sync::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views/system/localisation', 'localisation');

        $this->app['router']->aliasMiddleware('setLanguage', SetLanguage::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'localisation-migration');

        $this->publishes([
            __DIR__.'/../resources' => base_path('resources/assets/js/components/core'),
        ], 'documents-resources');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
