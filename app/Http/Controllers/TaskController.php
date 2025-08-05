<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\ApiResponse;
use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->index();

        return ApiResponse::success($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = $this->taskService->store($request);

        if ($task) {
            return ApiResponse::success($task);
        } else {
            return ApiResponse::error("Projeto não pertence ao usuario autenticado", 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
