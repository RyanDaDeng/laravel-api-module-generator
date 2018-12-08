<?php

namespace TimeHunter\LaravelApiModuleGenerator;

use Illuminate\Support\ServiceProvider;
use TimeHunter\LaravelApiModuleGenerator\Commands\LaravelApiModuleCommand;

class LaravelApiModuleGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'timehunter');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'timehunter');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__.'/../config/laravelapimodulegenerator.php', 'laravelapimodulegenerator');

        // Register the service the package provides.
        $this->app->singleton('laravelapimodulegenerator', function ($app) {
            return new LaravelApiModuleGenerator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelapimodulegenerator'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelapimodulegenerator.php' => config_path('laravelapimodulegenerator.php'),
        ], 'laravelapimodulegenerator');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/timehunter'),
        ], 'laravelapimodulegenerator.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/timehunter'),
        ], 'laravelapimodulegenerator.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/timehunter'),
        ], 'laravelapimodulegenerator.views');*/

        // Registering package commands.
         $this->commands([
             LaravelApiModuleCommand::class
         ]);
    }
}
