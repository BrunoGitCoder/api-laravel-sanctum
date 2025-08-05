<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Project::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $project = Project::create($request->all());

        return response()->json([
            'message' => 'Projeto criado com sucesso.',
            'data' => $project
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);

        if ($project) {
            return response()->json([
                'data' => $project
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ], 404);
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
            return response()->json([
                'message' => 'Projeto editado com sucesso.',
                'data' => $project
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ], 404);
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
            return response()->json([
                'message' => 'Projeto deletado com sucesso.',
                'data' => $project
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Projeto não encontrado.'
            ], 404);
        }
    }
}
