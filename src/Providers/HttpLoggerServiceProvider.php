<?php

namespace Epigra\HttpLogger\Providers;

use Illuminate\Support\ServiceProvider;

use Epigra\HttpLogger\Interfaces\LogProfileInterface;
use Epigra\HttpLogger\Interfaces\LogWriterInterface;

class HttpLoggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/http-logger.php' => config_path('http-logger.php'),
            ], 'config');
        }

        $this->app->singleton(LogProfileInterface::class, config('http-logger.log_profile'));
        $this->app->singleton(LogWriterInterface::class, config('http-logger.log_writer'));
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/http-logger.php', 'http-logger');
    }
}
