<?php

namespace App\Http\Controllers;

use App\Student;
use App\Admin;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 
        $data = DB::table('students')
            ->select(
            DB::raw('gender as gender'),
            DB::raw('count(*) as number'))
            ->groupBy('gender')
            ->get();

        $array[] = ['Gender', 'Number'];

        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->gender, $value->number];
        }

        // 
        $studentApplications = DB::table('students')
                    ->select(
                        DB::raw("day(created_at) as day"),
                        DB::raw("count(*) as number")) 
                    ->groupBy(DB::raw("day(created_at)"))
                    ->get();


        $result[] = ['Application', 'Number'];

        foreach ($studentApplications as $key => $value) {
            $result[++$key] = [$value->day, $value->number];
        }

       return view('chart.charts')->with('gender', json_encode($array))->with('application',json_encode($result));
    }


    public function applicationPage()
    {
        $students = Student::all();
        return view('student.index')->with('students', $students);
    }

    public function announcementPage(){
        $pageTitle = 'announcement';
        $announcements = Announcement::all();
        // return view('access_admin.announcement')->with('title', $pageTitle);
        return view('announcement.index')->with('title', $pageTitle)->with('announcements', $announcements);
    }
   
    public function accountsPage(){
        $pageTitle = 'accounts';
        $admins = Admin::All();
        
        // return view('access_admin.accounts')->with('title', $pageTitle);
        return view('users.index')->with('title', $pageTitle)->with('admins', $admins);
    }
}
