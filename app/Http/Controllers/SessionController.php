<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\Redirect;
use DB;

class SessionController extends Controller
{
    public function list()
    {
        $sessions = Session::all();
        return view('website.admin.pages.session.list', compact('sessions'));
    }
    
    public function create()
    {
        return view('website.admin.pages.session.create');
    }

    public function store(Request $r)
    {
        $session = new Session();
        $session->name = $r->name;
        if ($r->is_active != null) {
            $session->is_active = $r->is_active;
        } else {
            $session->is_active = '0';
        }
        $session->save();

        return Redirect::to('sessions')
            ->with('msg', 'Session Created successfully');
    }


    public function edit($id){
        $session = DB::table('sessions')
            ->where('id','=',$id )
            ->first();
        return view('website.admin.pages.session.edit',compact('session'));
   }

   public function update(Request $req,$id){
        $name = $req-> name;
        if($req-> is_active == null){
            $is_active = '0'; 
        }else{
            $is_active = '1';
        }
        $affected = DB::table('sessions')
              ->where('id', $id)
              ->update(
                [
                    'name' => $name,
                    'is_active' => $is_active
                ]
            );
        
        return Redirect::to('sessions')
            ->with('msg', 'Session updated successfully');
   }

   public function delete($id){
        DB::table('sessions')
            ->where('id','=',$id)
            ->delete();
        return redirect()->back()->with('fail','Successfully Deleted');
   }
}
