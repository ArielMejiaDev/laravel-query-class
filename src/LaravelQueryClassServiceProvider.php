<?php

namespace ArielMejiaDev\LaravelQueryClass;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LaravelQueryClassServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Registering package commands.
             $this->commands([InstallCommand::class]);
        }
    }

    public function register()
    {
        //
    }

    public function provides(): array
    {
        return [InstallCommand::class];
    }
}
