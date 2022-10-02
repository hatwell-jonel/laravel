<?php

namespace App\Http\Controllers\User;

use App\Announcement;
use App\Http\Controllers\Controller;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewController extends Controller
{
    public function announcementView(){
        // $announcements = Announcement::all();

        $today = Carbon::now()->format('Y-m-d');
        $announcements = Announcement::whereRaw("'$today' >= start_date and '$today' <= end_date")
        ->orderBy('id', 'ASC')->get();

        return view('student_access.announcement')->with('announcements', $announcements);
    }

    public function profileView(){
        $students = Student::all();
        return view('student_access.profile')->with('students', $students);
    }


    public function profileImage(Request $request){
        $user =  Auth::user();

        // dd($user);

        $imageName = time().'.'.$request->user_profile_image->extension();
        $request->user_profile_image->move(public_path('images/'), $imageName);

        $user->image = $imageName;
        $user->update();
        return back();
    }
}
