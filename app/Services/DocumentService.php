<?php

namespace App\Services;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class DocumentService
{
    public function index()
    {
        $user = auth()->user();
        $projectIds = $user->projects()->pluck('projects.id');

        if ($projectIds->isEmpty()) {
            return false;
        } else {
            return Document::with('project')->whereIn('project_id', $projectIds)->get();
        }

    }

    public function store(DocumentRequest $request)
    {
        if ($this->isMember($request)) {
            return Document::create([
                'project_id' => $request->input('project_id'),
                'file' => $request->input('file')
            ]);
        } else {
            return false;
        }
    }

    public function isMember(DocumentRequest $request)
    {
        $projectId = $request->input('project_id');
        $userId = auth()->id();

        return Project::find($projectId)?->users()->where('user_id', $userId)->exists();
    }
}