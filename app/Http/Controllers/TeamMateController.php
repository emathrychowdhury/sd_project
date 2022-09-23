<?php

namespace App\Http\Controllers;

use App\Models\TeamMate;
use Illuminate\Http\Request;

class TeamMateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teammates = TeamMate::all();

        return view("website.student.pages.teammates.index", compact("teammates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("website.student.pages.teammates.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_validate = $request->validate([
            'name' => "required|string",
            'email' => "required|email:rfc,dns|unique:team_mates|",
            'student_id' => "required|unique:team_mates",
            'batch' => "required|string",
            'section' => "required|string",
        ]);

        $save = TeamMate::create($request->all());

        if ($save) {
            return redirect()->route("teammate.index")->with('msg', 'Created successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMate $teammate)
    {
        return view("website.student.pages.teammates.edit", compact("teammate"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMate $teammate)
    {
        $data_validate = $request->validate([
            'name' => "required|string",
            'email' => "required|email:rfc,dns|",
            'student_id' => "required|",
            'batch' => "required|string",
            'section' => "required|string",
        ]);

        $teammate->name = $request->name;
        $teammate->email = $request->email;
        $teammate->student_id = $request->student_id;
        $teammate->batch = $request->batch;
        $teammate->section = $request->section;

        $save = $teammate->save();

        if ($save) {
            return redirect()->route("teammate.index")->with('msg', 'Updated successfully');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMate $teammate)
    {
        $teammate->delete();
        return redirect()->back()->with('msg', 'Deleted successfully');
    }
}
