<?php
namespace App\Repositories;

use App\Interfaces\Repositories\IProjectRepository;
use App\Models\Project;

class ProjectRepository implements IProjectRepository
{

    public function show(Project $project)
    {
        return Project::with('tasks.status')->findOrFail($project->id);
    }
}
