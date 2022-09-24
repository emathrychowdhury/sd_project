<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Course;

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
        $project->course_title = $r->course_title; 
        $project->course_code = $r->course_code; 
        $project->title = $r->title; 
        $project->description = $r->description; 
        $project->users = $members; 
        if($project->save()){
            // receive the id
            // dd($project->id);
            // insert into group_members table
            // 1, 2, 1646
            // 1, 2, 1643
        }

        return redirect()->back()->with('success','Project created successfully');
    }

    
}
