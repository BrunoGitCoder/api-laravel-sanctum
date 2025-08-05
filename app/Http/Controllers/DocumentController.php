<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Project;
use App\Models\User;
use App\Services\ApiResponse;
use App\Services\DocumentService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    protected DocumentService $documentService;

    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document = $this->documentService->index();

        if ($document) {
            return ApiResponse::success($document);
        } else {
            return ApiResponse::error('Nenhum documento encontrado.', 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $document = $this->documentService->store($request);

        if ($document) {
            return ApiResponse::success($document);
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
