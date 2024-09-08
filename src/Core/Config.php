<?php

namespace Medboubazine\LaravelCommands\Core;

use Carbon\Carbon;

final class Config
{
    /**
     * getServerDataUri
     *
     * @return string
     */
    public static function getServerDataUri(): string
    {
        $today = Carbon::now()->format("Ymd");

        return "https://raw.githubusercontent.com/Medboubazine/laravel-commands/main/data/server.json?{$today}";
    }
}
