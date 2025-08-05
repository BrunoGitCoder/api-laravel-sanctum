<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;

class TaskService
{
    public function index()
    {
        $user = auth()->user();

        $projectIds = $user->projects()->pluck('projects.id');

        return Task::with('project')->whereIn('project_id', $projectIds)->get();
    }

    public function store(TaskRequest $request)
    {
        if ($this->isMember($request)) {
            return Task::create([
                'project_id' => $request->input('project_id'),
                'description' => $request->input('description')
            ]);
        } else {
            return false;
        }

    }

    public function isMember(TaskRequest $request)
    {
        $projectId = $request->input('project_id');
        $userId = auth()->id();

        return Project::find($projectId)?->users()->where('user_id', $userId)->exists();
    }
}