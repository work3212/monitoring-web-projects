<?php

namespace App\Services\Check\Handlers;

use Exception;
use GuzzleHttp\Client;

class CheckUrlHandler
{
    private $responce;
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCode($url)
    {
        try {
            $this->responce = $this->client->request('GET', $url);
            $code = $this->responce->getStatusCode();
            return $code;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function getFindText($str)
    {
        $text = $this->responce->getBody()->getContents();
        if (strpos($text, $str)) {
            return true;
        } else {
            return false;
        }
    }
}
