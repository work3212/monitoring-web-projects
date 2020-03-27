<?php

namespace App\Http\Controllers;

use App\Jobs\CheckUrlJob;
use App\Services\Check\CheckService;
use App\Services\Projects\ProjectsService;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    private $checkService;
    private $projectsService;

    public function __construct(CheckService $checkService, ProjectsService $projectsService)
    {
        $this->checkService = $checkService;
        $this->projectsService = $projectsService;
    }

    public function index()
    {
        $projects = $this->projectsService->getProjectsAll();

        foreach ($projects as $project) {
            CheckUrlJob::dispatch($project->name, $project->keyword);
        }
        return redirect()->route('csm.projects.index');
    }

    public function checkOne($id)
    {
        $project = $this->projectsService->getProject($id);
        CheckUrlJob::dispatch($project->name, $project->keyword);
        return redirect()->route('csm.projects.index');
    }
}
