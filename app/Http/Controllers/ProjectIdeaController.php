<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Course;
use Illuminate\Http\Request;
use DB;

class ProjectIdeaController extends Controller
{
       public function projects($status){
        if($status=='all'){
            $user = DB::table('users')
                    ->where('email', '=', session('useremail'))->first();

            $projects = DB::table('projects')->select('projects.id', 'projects.title', 'projects.description', 'projects.is_approved', 'projects.users', 'assign_teachers.section')
                    ->join('assign_teachers','assign_teachers.course_id','=','projects.course_id')
                    ->where(['assign_teachers.user_id' => $user->id])
                    ->get();
        }
        else if($status=='pending'){
            $user = DB::table('users')
                    ->where('email', '=', session('useremail'))->first();

            $projects = DB::table('projects')
                    ->select('projects.id', 'projects.title', 'projects.description', 'projects.users', 'projects.is_approved', 'assign_teachers.section')
                    ->join('assign_teachers','assign_teachers.course_id','=','projects.course_id')
                    ->where(['assign_teachers.user_id' => $user->id, 'projects.is_approved' => 0])
                    ->get();
        }
        else if($status=='approved'){
            $user = DB::table('users')
                    ->where('email', '=', session('useremail'))->first();

            $projects = DB::table('projects')
                    ->select('projects.id', 'projects.title', 'projects.description', 'projects.users', 'projects.is_approved', 'assign_teachers.section')
                    ->join('assign_teachers','assign_teachers.course_id','=','projects.course_id')
                    ->where(['assign_teachers.user_id' => $user->id, 'projects.is_approved' => 1])
                    ->get();
        }
        return view('website.teacher.pages.pendingRequest', ['projects'=>$projects]);
   }

   public function approve($id){
        $affected = DB::table('projects')
              ->where('id', $id)
              ->update(['is_approved' => 1]);
        return redirect()->back()->with('success', 'Project has been succesfully approved!');
    }

    public function reject($id){
        DB::table('projects')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back()->with('fail','Project Deleted Successfully');
   }
}
