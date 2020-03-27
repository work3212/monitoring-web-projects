<?php

namespace App\Services\Viber\Api;

use App\Services\Viber\Commands\ViberCommandsController;
use App\Services\Viber\Repositories\EloquentViberRepository;
use GuzzleHttp\Client;

class ViberApiController
{
    private $client;
    private $viberConfig;

    public function __construct(
        EloquentViberRepository $eloquentViberRepository
    ) {
        $this->client = new Client();
        $this->viberConfig = config('viber');
    }

    public function connect()
    {
        $options = [
            'body' => \GuzzleHttp\json_encode($this->viberConfig['body']),
            'headers' => $this->viberConfig['headers']
        ];
        $this->client->request('POST', $this->viberConfig['connect_url'], $options);
    }

    public function message($text, $tokens)
    {
        $mess = [
            "sender" => [
                "name" => "Мониторинг проектов",
            ],
            "broadcast_list" => $tokens,
            "type" => "text",
            "text" => $text
        ];

        $send = \GuzzleHttp\json_encode($mess);

        $options = [
            'body' => $send,
            'headers' => $this->viberConfig['headers']
        ];

        return $this->client->request('POST', $this->viberConfig['message_url'], $options);
    }

    public function getUsers()
    {
        $options = [
            'headers' => $this->viberConfig['headers']
        ];

        $response = $this->client->request('POST', $this->viberConfig['info_url'], $options);
        $users = \GuzzleHttp\json_decode($response->getBody());
        return $users->members;
    }

}
