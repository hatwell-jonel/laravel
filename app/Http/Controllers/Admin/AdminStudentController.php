<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Student;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller
{
    public function store(Request $request){

        

        $generator  = Helper::IDGenerator(new Student,'student_id', 5, date('Y'));
        
        Student::create([
            'student_id'    => $generator,
            'firstname'     => $request->student_firstname,
            'middlename'    => $request->student_middlename,
            'lastname'      => $request->student_lastname,
            'contact'       => $request->student_contact,
            'email'         => $request->student_email,
            'gender'        => $request->student_gender,
            'birthdate'     => $request->student_birthdate,
            'birthplace'    => $request->student_birthplace,
            'address'       => $request->student_address,
            'age'           => Carbon::parse($request->student_birthdate)->age,
        ]);


        User::Create([
            'user_level'    => "student",
            'account_id'    => $generator,
            'firstname'     => $request->student_firstname,
            'middlename'    => $request->student_middlename,
            'lastname'      => $request->student_lastname,
            'contact'       => $request->student_contact,
            'email'         => $request->student_email,
            'gender'        => $request->student_gender,
            'birthdate'     => $request->student_birthdate,
            'name'          => $request->student_firstname. " " . $request->student_lastname,
            'birthplace'    => $request->student_birthplace,
            'address'       => $request->student_address,
            'age'           => Carbon::parse($request->student_birthdate)->age,
            'image'         => '/default_profile/user.png',
            'password'      => Hash::make($generator.$request->student_lastname),
        ]);


        return redirect()->back();
    }

    public function update(Request $request, $id){
        $student                = Student::find($id);
        $student->firstname     = $request->update_student_firstname;
        $student->middlename    = $request->update_student_middlename;
        $student->lastname      = $request->update_student_lastname;
        $student->contact       = $request->update_student_contact;
        $student->email         = $request->update_student_email;
        $student->gender        = $request->update_student_gender;
        $student->birthdate     = $request->update_student_birthplace;
        $student->age           = Carbon::parse($request->birthdate)->age; 
        $student->birthplace    = $request->update_student_birthdate;
        $student->address       = $request->update_student_address;
        $student->update();
        return redirect()->back();
    }

    public function destroy($id){
        $student = Student::find($id);
        $student_id = $student->student_id;
        $user = User::where("account_id", $student_id)->first();
        $student->delete();
        // $user->delete();
        return redirect()->back();
    }
}
