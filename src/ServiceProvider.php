<?php

namespace Medboubazine\LaravelCommands;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Medboubazine\LaravelCommands\Commands\DumpCommand;

final class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    DumpCommand::class,
                ],
            );
        }
    }
}
