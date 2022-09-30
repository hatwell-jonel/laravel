<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Support\Facades\DB;

class AdminViewController extends Controller
{
    public function chartsView(){

        // GENDER CHART
        $data = DB::table('students')
        ->select(
            DB::raw('gender as gender'),
            DB::raw('count(*) as number'))
        ->groupBy('gender')
        ->get();

        $array[] = ['Gender', 'Number']; 

        foreach($data as $key => $value){
            $array[++$key] = [$value->gender, $value->number];
        }

        // APPLICATION CHART
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

        return view('admin_access.charts')->with('gender', json_encode($array))->with('application',json_encode($result));
    }
    public function studentsView(){
        $students = Student::All();
        return view('admin_access.students')->with('students', $students);
    }
    public function announcementView(){
        $announcements = Announcement::All();
        return view('admin_access.announcement')->with('announcements', $announcements);
    }
    public function accountView(){
        $admins = Admin::All();
        return view('admin_access.accounts')->with('admins', $admins);
    }
}
