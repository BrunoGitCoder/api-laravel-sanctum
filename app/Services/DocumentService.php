<?php

namespace App\Services;

use App\Models\Document;

class DocumentService
{
    public function index()
    {
        return Document::where('project_id', auth()->id())->get();
    }
}