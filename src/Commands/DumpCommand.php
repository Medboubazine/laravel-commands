<?php

namespace Medboubazine\LaravelCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

final class DumpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medboubazine-command:dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reports to wesite owner to validate current installation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump(Config::get("app.name"), "FROM  PACKAGE");
    }
}
