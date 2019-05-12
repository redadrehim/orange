<?php

namespace Layer\Base;

use Illuminate\Support\ServiceProvider;
use Layer\Base\Commands\API\APIControllerGeneratorCommand;
use Layer\Base\Commands\API\APIGeneratorCommand;
use Layer\Base\Commands\API\APIRequestsGeneratorCommand;
use Layer\Base\Commands\API\TestsGeneratorCommand;
use Layer\Base\Commands\APIScaffoldGeneratorCommand;
use Layer\Base\Commands\Common\MigrationGeneratorCommand;
use Layer\Base\Commands\Common\ModelGeneratorCommand;
use Layer\Base\Commands\Common\RepositoryGeneratorCommand;
use Layer\Base\Commands\Publish\GeneratorPublishCommand;
use Layer\Base\Commands\Publish\LayoutPublishCommand;
use Layer\Base\Commands\Publish\PublishTemplateCommand;
use Layer\Base\Commands\Publish\VueJsLayoutPublishCommand;
use Layer\Base\Commands\RollbackGeneratorCommand;
use Layer\Base\Commands\Scaffold\ControllerGeneratorCommand;
use Layer\Base\Commands\Scaffold\RequestsGeneratorCommand;
use Layer\Base\Commands\Scaffold\ScaffoldGeneratorCommand;
use Layer\Base\Commands\Scaffold\ViewsGeneratorCommand;
use Layer\Base\Commands\VueJs\VueJsGeneratorCommand;

class InfyOmGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/laravel_generator.php';

        $this->publishes([
            $configPath => config_path('infyom/laravel_generator.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('infyom.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('infyom.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('infyom.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('infyom.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('infyom.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('infyom.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('infyom.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('infyom.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('infyom.vuejs', function ($app) {
            return new VueJsGeneratorCommand();
        });
        $this->app->singleton('infyom.publish.vuejs', function ($app) {
            return new VueJsLayoutPublishCommand();
        });

        $this->commands([
            'infyom.publish',
            'infyom.api',
            'infyom.scaffold',
            'infyom.api_scaffold',
            'infyom.publish.layout',
            'infyom.publish.templates',
            'infyom.migration',
            'infyom.model',
            'infyom.repository',
            'infyom.api.controller',
            'infyom.api.requests',
            'infyom.api.tests',
            'infyom.scaffold.controller',
            'infyom.scaffold.requests',
            'infyom.scaffold.views',
            'infyom.rollback',
            'infyom.vuejs',
            'infyom.publish.vuejs',
        ]);
    }
}
