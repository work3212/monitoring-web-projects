<?php


namespace App\Services\Projects\Repositories;

use App\Models\Project;

class EloquentProjectRepository
{
    public function getProjectsPaginate(int $paginate)
    {
        $columns = ['id', 'name'];
        $result = Project::orderBy('id', 'DESC')
            ->select($columns)
            ->paginate($paginate);
        return $result;
    }

    public function getAll()
    {
        $columns = ['id', 'name', 'keyword'];
        $result = Project::select($columns)
            ->get();
        return $result;
    }

    public function createProject(array $data) : Project
    {
        $project = new Project();
        return $project->create($data);
    }

    public function updateProject(Project $project, array $data)
    {
        return $project->update($data);
    }

    public function delProject(int $id)
    {
        $projects = Project::findOrFail($id);
        return $projects->delete();
    }


    public function findProject($id)
    {
        $columns = ['id', 'name', 'keyword'];
        $result = Project::findOrFail($id);
        return $result;
    }
}
