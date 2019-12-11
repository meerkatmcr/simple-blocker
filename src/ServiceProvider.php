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
