<?php

namespace App\Services\Viber\Commands;

use App\Services\Viber\ViberRestApiService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CheckYandexController
{
    private $viberRestApiService;

    public function __construct(ViberRestApiService $viberRestApiService)
    {
        $this->viberRestApiService = $viberRestApiService;
    }

    public function handle()
    {
        $config = config('yandex');
        $client = new Client();
        $options = [
            'headers' => [
                'Authorization' => $config['token']
            ]
        ];
        $response = $client->request('GET',
            'https://api.webmaster.yandex.net/v4/user/' . $config['user_id'] . '/hosts/' . $config['host_id'] . '/summary',
            $options);

        $data = \GuzzleHttp\json_decode($response->getBody());

        $sqi = "Индекс качества сайта: " . $data->sqi;
        $countPages = "\r\nКоличество страниц в индексе: " . $data->searchable_pages_count;
        $countNotPages = "\r\nКоличество исключенных страниц: " . $data->excluded_pages_count;
        $message = $sqi . ' ' . $countPages . ' ' . $countNotPages;
        $this->viberRestApiService->sendMessageViber($message);
    }
}
