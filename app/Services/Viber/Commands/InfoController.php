<?php

namespace App\Services\Viber\Commands;

use App\Services\Viber\ViberRestApiService;

class InfoController
{
    private $viberRestApiService;

    public function __construct(ViberRestApiService $viberRestApiService)
    {
        $this->viberRestApiService = $viberRestApiService;
    }
    public function handle()
    {
        $this->viberRestApiService->sendMessageViber('Была отправлена не известная команда');
    }

}
