<?php


namespace App\Services\Check;


use App\Services\Check\Handlers\CheckUrlHandler;

class CheckService
{
    private $checkUrl;

    public function __construct(CheckUrlHandler $checkUrlHandler)
    {
        $this->checkUrl = $checkUrlHandler;
    }


    public function checkProjects($url, $text)
    {
        if ($this->checkUrl->getCode($url) == 200) {
            return $this->checkUrl->getFindText($text);
        } else {
            return false;
        }
    }
}
