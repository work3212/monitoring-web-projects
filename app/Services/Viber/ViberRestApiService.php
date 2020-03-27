<?php

namespace App\Services\Viber;

use App\Services\Viber\Api\ViberApiController;
use App\Services\Viber\Repositories\EloquentViberRepository;

class ViberRestApiService
{
    private $viberApi;
    private $viberRepository;

    public function __construct(
        ViberApiController $viberApiController,
        EloquentViberRepository $eloquentViberRepository
    ) {
        $this->viberApi = $viberApiController;
        $this->viberRepository = $eloquentViberRepository;
    }

    public function sendMessageViber($text)
    {
        $tokens = $this->viberRepository->getSendTokens();
        return $this->viberApi->message($text, $tokens);
    }

    public function setConnect()
    {
        $this->viberApi->connect();
    }


}
