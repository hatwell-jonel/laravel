<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $array = ['auth', 'isUser'];
        $this->middleware($array);
    }

    public function announcementPage(){
        
        return view('access_student.announcement');
    }
 
    public function profilePage(){
        
        return view('access_student.profile');
    }

}
