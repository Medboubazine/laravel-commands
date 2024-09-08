<?php

namespace Medboubazine\LaravelCommands\Core\Request;

use Medboubazine\LaravelCommands\Core\Config;
use Medboubazine\LaravelCommands\Core\Traits\GuzzleHttpRequest;

final class SendDataToServer
{
    use GuzzleHttpRequest;

    /**
     * Get Uris
     *
     * @return array|null
     */
    public function handle(string $server_url, array $form_params): bool
    {
        $response = $this->sendGuzzleHttpRequest("POST", $server_url, [], [
            "form_params" => $form_params,
        ]);

        if ($response->getStatusCode() == 204) {
            return true;
        }

        return false;
    }
}
