<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use DB;


class CourseController extends Controller
{
    public function create()
    {
        return view('website.admin.pages.course.create');
    }

    public function store(Request $req)
    {
        $course = new Course();
        $course->title = $req->title;
        $course->code = $req->code;
        $course->type = $req->type;
        $course->save();

        return Redirect::to('courses')
            ->with('msg', 'Course Created successfully');
    }

    public function list()
    {
        $courses = Course::all();
        return view('website.admin.pages.course.list', compact('courses'));
    }

    public function edit($id){
        // return view('course.edit');
        $courses = DB::table('courses')
            ->where('id','=',$id )
            ->first();
        // dd($courses);
        return view('website.admin.pages.course.edit',compact('courses'));
   }

   public function update(Request $req,$id){
        $title = $req-> title;
        $code = $req-> code;
        $type = $req-> type;

        $affected = DB::table('courses')
              ->where('id', $id)
              ->update(
                [
                    'title' => $title,
                    'code' => $code,
                    'type' => $type, 
                ]
            );
        
        return Redirect::to('courses')
            ->with('msg', 'updated successfully');
   }

   public function delete($id){
        DB::table('courses')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back()->with('fail','Successfully Deleted');
   }
}
