<?php

namespace App\Http\Controllers;

use App\Services\Viber\ViberRestApiService;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    private $viberRestApiService;

    public function __construct(ViberRestApiService $viberRestApiService)
    {
        $this->viberRestApiService = $viberRestApiService;
    }

    public function connect()
    {
        $this->viberRestApiService->setConnect();
    }
}
