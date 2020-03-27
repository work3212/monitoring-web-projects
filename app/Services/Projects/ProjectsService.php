<?php

namespace App\Services\Projects;

use App\Models\Project;
use App\Services\Projects\Repositories\EloquentProjectRepository;

class ProjectsService
{
    protected $projectsRepository;

    public function __construct(EloquentProjectRepository $projectRepository)
    {
        $this->projectsRepository = $projectRepository;
    }

    public function getPaginateAll(int $paginate)
    {
        return $this->projectsRepository->getProjectsPaginate($paginate);
    }

    public function getProjectsAll()
    {
        return $this->projectsRepository->getAll();
    }

    public function saveForm(array $data)
    {
        return $this->projectsRepository->createProject($data);
    }

    public function updateForm(Project $project, array $data)
    {
        return $this->projectsRepository->updateProject($project, $data);
    }

    public function delForm(int $id)
    {
        return $this->projectsRepository->delProject($id);
    }

    public function getProject($id)
    {
        return $this->projectsRepository->findProject($id);
    }

}
