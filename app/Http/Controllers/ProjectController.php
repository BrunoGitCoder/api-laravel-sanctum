<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\UserProject;
use App\Services\ApiResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponse::success(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->all());
        $project->users()->attach(auth()->id());

        return ApiResponse::success($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        if ($project) {
            return ApiResponse::success($project);
        } else {
            return ApiResponse::error('Projeto não encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->update($request->all());
            return ApiResponse::success($project);
        } else {
            return ApiResponse::error('Projeto não encontrado', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();
            return ApiResponse::success($project, 'Projeto deletado');
        } else {
            return ApiResponse::error('Projeto não encontrado', 404);
        }
    }
}
