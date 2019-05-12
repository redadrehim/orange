<?php

namespace Layer\BaseBuilder;

use Illuminate\Support\ServiceProvider;
use Layer\BaseBuilder\Commands\BaseBuilderRoutesPublisherCommand;

class BaseBuilderServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $configPath = __DIR__.'/../config/generator_builder.php';

        $this->publishes([
            $configPath => config_path('infyom/generator_builder.php'),
        ]);
        
        $this->loadViewsFrom(__DIR__.'/../views/', 'generator-builder');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('infyom.publish.generator-builder', function ($app) {
            return new BaseBuilderRoutesPublisherCommand();
        });

        $this->commands([
            'infyom.publish.generator-builder'
        ]);
    }
}