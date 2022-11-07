<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProjectController extends Controller
{
    public function list(){
        $projects = Project::all();
        return view('website.student.pages.project.list', compact('projects'));
    }
    public function create(){
        $users = User::where('role','student')->get();
        $courses = Course::all();
        return view('website.student.pages.project.create',['users'=>$users,'courses'=>$courses]);
    }

    public function store(Request $r){
   
        $members =implode(",",$r->members);
        
        $project = new Project(); 
        $project->course_id = $r->course_id; 
        $project->title = $r->title; 
        $project->description = $r->description; 
        $project->users = $members; 
        $project->save();
        // if($project->save()){
            // receive the id
            // dd($project->id);
            // insert into group_members table
            // 1, 2, 1646
            // 1, 2, 1643
        // }
        return Redirect::to('projects')
        ->with('msg', 'Project Created successfully');
        // return redirect()->back()->with('success','Project created successfully');
    }
    public function edit($id){
        
        // return view('course.edit');
        $users = User::where('role','student')->get();
        $courses = Course::all();
        $project = DB::table('projects')
            ->where('id','=',$id )
            ->first();
        $members = explode(",",$project->users);

        // dd($members);
        return view('website.student.pages.project.edit',compact('courses','users','project','members'));
   }

   public function update(Request $r,$id){
    $members =implode(",",$r->members); 
    $course_id = $r->course_id; 
    $title = $r->title; 
    $description = $r->description; 
    // $users = $members;

        $affected = DB::table('projects')
              ->where('id', $id)
              ->update(
                [
                    'title' => $title,
                    'course_id' => $course_id,
                    'description' => $description, 
                    'users' => $members, 
                ]
            );
        
        return Redirect::to('projects')
            ->with('msg', 'Project updated successfully');
   }

   public function delete($id){
        DB::table('projects')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back()->with('fail','Project Deleted Successfully');
   }
    
}
