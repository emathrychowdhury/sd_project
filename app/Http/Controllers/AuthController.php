<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register_student()
    {
        return view('website.user.register-student');
    }
    public function register_teacher()
    {
        return view('website.user.register-teacher');
    }

    public function registerstore(Request $request)
    {
        // dd($request);
        $username = $request->username;
        $useremail = $request->useremail;
        $studentid = $request->studentid;
        $userpass = md5($request->password);
        $userconfpass = md5($request->conf_password);
        $userrole = $request->role;
        if ($userpass != $userconfpass) {
            return redirect()->back()->with('err_msg', 'Password Mismatch');
        } else {
            DB::table('users')->insert([
                'name' => $username,
                'email' => $useremail,
                'studentid' => $studentid,
                'password' => $userpass,
                'role' => $userrole
            ]);

            return redirect()->to('/login')->with('success', 'Successfully Registered');
        }
    }

    public function login()
    {
        return view('website.user.login');
    }

    public function loginstore(Request $request)
    {
        // dd($request);
        $useremail = $request->useremail;
        $password = md5($request->password);
        $login = DB::table('users')
            ->where('email', '=', $useremail)
            ->where('password', '=', $password)
            ->first();

        if (!$login) {
            return redirect()->back()->with('error_msg', 'invalid email or password');
        } else {
            Session::put('username', $login->name);
            Session::put('useremail', $login->email);
            Session::put('userrole', $login->role);
            // dd(Session::all());
            return redirect()->to('/');
        }
    }

    public function dashboard()
    {
        $user = session()->all();
        if ($user['userrole'] == "admin") {
            return view('website.admin.pages.dashboard');
        } else if ($user['userrole'] == "teacher") {
            return view('website.teacher.pages.dashboard');
        } else if ($user['userrole'] == "student") {
            return view('website.student.pages.dashboard');
        }
        return redirect()->to("login");
        // return view('website.dashboard.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->to('login');
    }
}
