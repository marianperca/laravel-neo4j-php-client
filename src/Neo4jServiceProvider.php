<?php

namespace TSF\Neo4jClient;

use Illuminate\Support\ServiceProvider;
use RuntimeException;

class Neo4jServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/config.php' => config_path('neo4j.php')]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('neo4jclient', function ($app) {
            $config = $app['config']['neo4j'];

            if (!$config) {
                throw new RunTimeException('Neo4j database configuration not found. Please run `php artisan vendor:publish --provider="TSF\Neo4jClient\Neo4jServiceProvider"`.');
            }

            return Neo4jClient::create($config)->build();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'neo4jclient',
        ];
    }
}