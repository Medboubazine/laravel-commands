<?php

namespace Medboubazine\LaravelCommands\Core\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface;

trait GuzzleHttpRequest
{
    /**
     * Send Request via guzzle http
     *
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param array $options
     * @return ResponseInterface
     */
    public function sendGuzzleHttpRequest(string $method, string $uri, array $headers = [], array $options = []): ResponseInterface
    {
        $client = new Client();
        ///
        /// Request Configurations
        ///
        $headers = array_merge($headers, $options['headers'] ?? []);
        if ($options['headers']) {
            unset($options['headers']);
        }
        $options = [
            "allow_redirects" => false,
            "connect_timeout" => 5,
            "http_errors" => false,
            "verify" => false,
            "headers" => $headers,
        ];
        ///
        /// Response
        ///
        return $client->request($method, $uri, $options);
    }
}
