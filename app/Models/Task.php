<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'description'];


    // tasks n:1 project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
