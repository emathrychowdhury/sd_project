<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
use App\Models\Course;
use App\Models\User;

class AssignTeacher extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];    
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function sessions()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
