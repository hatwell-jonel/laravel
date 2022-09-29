<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\User;
use App\Student;
use Carbon\Carbon;
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
        // $announcements = Announcement::All();
        $students = Student::where('student_id', '=',Auth::user()->account_id)->get();
        $today = Carbon::now()->format('Y-m-d');

        $announcements = Announcement::whereRaw("'$today' >= start_date and '$today' <= end_date")
        ->orderBy('id', 'ASC')->get();
        
        // return view('access_student.announcement')->with('announcements', $announcements);
        return view('access_student.announcement',['announcements'=>$announcements],['students' =>$students]);
    }

   

 
    public function profilePage(){
        // $students = Student::where('student_id', '=',Auth::user()->account_id)->get();
        $students = User::all();
        return view('access_student.profile')->with('students', $students);
    }   






    public function storeImage(Request $request, $id){
        $this->validate($request,[
            'profile_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        $studentdata = User::find($id);
        // dd($studentdata);

        $currentfile = $studentdata->image;
        //dd($currentfile);
        $userid = $studentdata->account_id;


        if($request->hasfile('profile_image'))
         {
            $image = array();
            if($files = $request->file('profile_image')){
                foreach($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'public/images/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path,$image_full_name);
                    $image[] = $image_url;
                }
            }

            if($studentdata->image == "")
            {
                $currentfile .= implode('|',$image);
            }
            else{
                $currentfile .= '|'. implode('|',$image);

            }

         }
            $currentpic = str_replace($studentdata->image,'',$image);
            $studentdata->image = $image_url;
            $studentdata->update();
        // return view('access_student.profile');
        return redirect('/student/profile')->with('Profile Updated');
    }

}
