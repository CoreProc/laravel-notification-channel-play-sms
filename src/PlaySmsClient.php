<?php

namespace CoreProc\PlaySms;

use GuzzleHttp\Client;

class PlaySmsClient
{
    private $client;
    private $apiKey;
    private $username;

    public function __construct($baseUrl, $username, $apiKey, $options = [])
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
        $this->client = new Client(array_merge(
            ['base_uri' => $baseUrl],
            $options
        ));
    }

    public function send($mobileNumber, $message)
    {
        $this->client->get('/index.php', [
            'query' => [
                'app' => 'ws',
                'u' => $this->username,
                'h' => $this->apiKey,
                'op' => 'pv',
                'to' => $mobileNumber,
                'msg' => $message,
            ],
        ]);
    }
}