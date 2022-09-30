<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index(){
        return view('student_access.announcement');
    }
    public function profileView(){
        return view('student_access.profile');
    }
}
