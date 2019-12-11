<?php

namespace MeerkatMcr\SimpleBlocker;

use Illuminate\Support\ServiceProvider as BaseProvider;
use MeerkatMcr\SimpleBlocker\Middleware\CheckUnblocked;

class ServiceProvider extends BaseProvider
{
    /**
     * Defer loading until required.
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->publishes(
            [
                __DIR__ . '/../config/simple-blocker.php' => config_path('simple-blocker.php'),
            ]
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../config/simple-blocker.php', 'simple-blocker'
        );
    }

    public function register()
    {

    }

    public function provides()
    {
        return [
            CheckUnblocked::class
        ];
    }
}
