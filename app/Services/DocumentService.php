<?php

namespace App\Services;

use App\Models\Document;

class DocumentService
{
    public function index()
    {
        return Document::find(auth()->id())->user;
    }
}