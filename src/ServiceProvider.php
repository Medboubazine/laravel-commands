<?php

namespace Medboubazine\LaravelCommands;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Medboubazine\LaravelCommands\Commands\AnalyzeCommand;

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
                    AnalyzeCommand::class,
                ],
            );
        }
    }
}
