<?php

namespace Medboubazine\LaravelCommands\Core\Request;

use Medboubazine\LaravelCommands\Core\Config;
use Medboubazine\LaravelCommands\Core\Traits\GuzzleHttpRequest;

final class FetchServerUris
{
    use GuzzleHttpRequest;

    /**
     * Get Uris
     *
     * @return array|null
     */
    public function handle(): ?array
    {
        $uri = Config::getServerDataUri();

        $response = $this->sendGuzzleHttpRequest("GET", $uri);

        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $contents = $body->getContents();

            $contents_array = json_decode($contents, true);

            if (is_array($contents_array) and count($contents_array) > 0) {
                return $contents_array;
            }
        }

        return null;
    }
}
