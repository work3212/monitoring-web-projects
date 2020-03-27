<?php

namespace App\Services\Viber\Commands;

use App\Jobs\CheckUrlJob;
use App\Services\Projects\ProjectsService;

class CheckProjectsController
{
    protected $projectsService;

    public function __construct(ProjectsService $projectsService)
    {
        $this->projectsService = $projectsService;
    }

    public function handle()
    {
        $projects = $this->projectsService->getProjectsAll();

        foreach ($projects as $project) {
            CheckUrlJob::dispatch($project->name, $project->keyword);
        }
    }
}
