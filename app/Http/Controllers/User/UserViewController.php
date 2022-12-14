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
        // dd("expited");
        return view('student_access.announcement')->with('announcements', $announcements);
    }

    public function profileView(){
        $students = Student::all();
        return view('student_access.profile')->with('students', $students);
    }


    public function profileImage(Request $request, $id){

        $user = User::find($id);
        // dd($user->id);
        $userid = $user->account_id;
        // dd($userid);

        if($request->hasFile('user_profile_image')){
            $imagename = 'profile-'. time()  . '.' . $request->user_profile_image->guessExtension();
            $request->user_profile_image->move(public_path('images/'), $imagename);
            $user->image    = $imagename;
        }else{
            return back()->withStatus('Please input image.');
        }
        $user->update();    

        // $user = User::find($id);
        // dd($user);
        //  $imageName = time().'.'.$request->user_profile_image->extension();
        // $request->user_profile_image->move(public_path('images/'), $imageName);
        // $user->image = $imageName;
        return back();
    }
}
