<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
