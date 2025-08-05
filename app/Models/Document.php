<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = ['project_id', 'file'];

    // document 1:1 project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
