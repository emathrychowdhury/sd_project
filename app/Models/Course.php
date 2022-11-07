<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignTeacher;
use App\Models\Project;

class Course extends Model
{
    use HasFactory;
    public function assignTeachers()
    {
        return $this->hasMany(AssignTeacher::class);
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
