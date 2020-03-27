<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Viber\Repositories\EloquentViberRepository;
use App\Services\Viber\ViberCommandsService;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class ViberController extends Controller
{
    private $viberCommandsService;
    private $viberRepository;

    public function __construct(
        EloquentViberRepository $eloquentViberRepository,
        ViberCommandsService $viberCommandsService
    ) {
        $this->viberCommandsService = $viberCommandsService;
        $this->viberRepository = $eloquentViberRepository;
    }


    public function getMessage(Request $request)
    {
        $status = $request->event;

        switch ($status) {
            case "subscribed":
                $this->viberRepository->addViberUser($request);
                break;
            case "unsubscribed":
                $this->viberRepository->delUser($request);
                break;
            case "message":
                $this->viberCommandsService->runCommands($request);
                break;
            default:
                \Log::info('Было отправлено не известное событие');
        }
    }
}
