<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AssignTeacher;

class User extends Model
{
    use HasFactory;
    public function assignTeachers()
    {
        return $this->hasMany(AssignTeacher::class);
    }
}
