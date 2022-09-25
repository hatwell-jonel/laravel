<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $announcements = Announcement::All();
        return view('access_student.announcement')->with('announcements', $announcements);
    }
 
    public function profilePage(Request $request){
        return view('access_student.profile');
    }

    public function storeImage(Request $request){
        // $user = Auth::user();
        // $user = User::find($id);
        // dd($user->image);
        // if($request->hasFile('profile_image')){
        //     $imagename = 'profile-'. time()  . '.' . $request->profile_image->guessExtension();
        //     $request->profile_image->move(public_path('images/profile'), $imagename);
        //     $user->image    = $imagename;
        //     $user->update();
        // }else{
        //     $user->image    = null;
        // }
        return view('access_student.profile');
    }

}
