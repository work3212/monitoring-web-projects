<?php

namespace App\Services\Viber;

use App\Services\Viber\Commands\CheckProjectsController;
use App\Services\Viber\Commands\CheckYandexController;
use App\Services\Viber\Commands\InfoController;
use App\Services\Viber\Commands\ListProjectController;

class ViberCommandsService
{
    private $checkCommands;
    private $listProjects;
    private $checkYandex;
    private $infoMessage;

    public function __construct(
        CheckProjectsController $checkProjectsController,
        ListProjectController $listProjectController,
        CheckYandexController $checkYandexController,
        InfoController $infoController
    ) {
        $this->checkCommands = $checkProjectsController;
        $this->listProjects = $listProjectController;
        $this->checkYandex = $checkYandexController;
        $this->infoMessage = $infoController;
    }

    public function runCommands($data)
    {
        $text = $data->message['text'];
        switch ($text) {
            case "check":
                $this->checkCommands->handle();
                break;
            case "list":
                $this->listProjects->handle();
                break;
            case "yandex":
                $this->checkYandex->handle();
                break;
            default:
                $this->infoMessage->handle();
        }
    }
}
