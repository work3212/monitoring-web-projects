<?php

namespace App\Services\Viber\Commands;

use App\Services\Projects\ProjectsService;
use App\Services\Viber\ViberRestApiService;

class ListProjectController
{
    private $projectsService;
    private $viberRestApiService;

    public function __construct(ProjectsService $projectsService, ViberRestApiService $viberRestApiService)
    {
        $this->projectsService = $projectsService;
        $this->viberRestApiService = $viberRestApiService;
    }

    public function handle()
    {
        $projects = $this->projectsService->getProjectsAll();

        foreach ($projects as $project) {
            $this->viberRestApiService->sendMessageViber($project->name . ' Ключ: ' . $project->keyword. ' ID: ' . $project->id);
        }
    }
}
