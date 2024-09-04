<?php

namespace Medboubazine\LaravelCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

final class AnalyzeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medboubazine-commands:analyze';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analyze current installation packages';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump(Config::get("app.name"), "FROM  PACKAGE");
    }
}
