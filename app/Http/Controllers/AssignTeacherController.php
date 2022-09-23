<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignTeacher;
use App\Models\Session;
use App\Models\Course;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Redirect;

class AssignTeacherController extends Controller
{
    public function create()
    {
        $sessions = Session::all();
        $courses = Course::all();
        $users = User::where('role','teacher')->get();
        return view('website.admin.pages.assign-teacher.create', ['sessions' => $sessions, 'courses' => $courses , 'users'=>$users]);
    }


    public function store(Request $req)
    {
        // return $req;
        $assignteacher = new AssignTeacher();
        $assignteacher->session_id = $req->session_id;
        $assignteacher->course_id = $req->course_id;
        $assignteacher->section = $req->section;
        $assignteacher->user_id = $req->user_id;
        $assignteacher->save();

        return Redirect::to('assign-teacher')
            ->with('msg', 'Assigned Course To Teacher successfully');
    }

    public function list()
    {
        $assignTeachers = AssignTeacher::all();
        return view('website.admin.pages.assign-teacher.list', compact('assignTeachers'));
    }
    public function edit($id){
        $sessions = Session::all();
        $courses = Course::all();
        $users = User::where('role','teacher')->get();
        $assign_teachers = DB::table('assign_teachers')
            ->where('id','=',$id )
            ->first();
        return view('website.admin.pages.assign-teacher.edit', ['sessions' => $sessions, 'courses' => $courses , 'users'=>$users, 'assign_teachers'=>$assign_teachers]);
   }

   public function update(Request $req,$id){
        $session_id = $req-> session_id;
        $course_id = $req-> course_id;
        $section = $req-> section;
        $user_id = $req-> user_id;

        $affected = DB::table('assign_teachers')
              ->where('id', $id)
              ->update(
                [
                    'session_id' => $session_id,
                    'course_id' => $course_id,
                    'section' => $section, 
                    'user_id' => $user_id, 
                ]
            );
        
        return Redirect::to('assign-teacher')
            ->with('msg', 'Assigned Course To Teacher Information Updated Successfully');
   }

   public function delete($id){
        DB::table('assign_teachers')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back()->with('fail','Successfully Deleted');
   }
   
}

