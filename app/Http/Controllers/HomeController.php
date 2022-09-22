<?php

namespace App\Http\Controllers;

use App\Student;
use App\Admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pageTitle = 'dashboard';
        return view('access_admin.dashboard')->with('title', $pageTitle);
    }

    public function applicationPage()
    {
        $students = Student::all();
        return view('student.index')->with('students', $students);
    }

    public function announcementPage(){
        $pageTitle = 'announcement';
        return view('access_admin.announcement')->with('title', $pageTitle);
    }
   
    public function accountsPage(){
        $pageTitle = 'accounts';
        $admins = Admin::All();
        
        // return view('access_admin.accounts')->with('title', $pageTitle);
        return view('users.index')->with('title', $pageTitle)->with('admins', $admins);
    }
}
