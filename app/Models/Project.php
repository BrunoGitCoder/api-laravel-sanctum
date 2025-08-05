<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    // project 1:1 document
    public function document()
    {
        return $this->hasOne(Document::class);
    }

    // project 1:n tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // projects n:n users
    public function users(){
        return $this->belongsToMany(User::class, 'project_user');
    }
}
