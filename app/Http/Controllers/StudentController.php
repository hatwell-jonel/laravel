<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Helpers\Helper;
use PHPUnit\TextUI\Help;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students = Student::all();
        return view('student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $generator = Helper::IDGenerator($student,'student_id', 5, date('Y'));

        $student->student_id = $generator;
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->lastname = $request->lastname;
        $student->contact = $request->contact;
        // $student->email = $request->email;
        $student->email = $generator.'@'.'email'.'.com';
        $student->gender = $request->gender;
        $student->birthdate = $request->birthdate;
        $student->birthplace = $request->birthplace;
        $student->address = $request->address;
        $student->save();

        $user = new User;
        $user->name = $request->lastname;
        $user->user_level = "student";
        // $user->email = $request->email;
        $user->email = $generator.'@'.'gmail'.'.com';
        $user->password = Hash::make($request->firstname.$request->lastname);
        $user->save();

        return redirect('/students')->with("message", 'Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show')->with('student', $student);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Student::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->lastname = $request->lastname;
        $student->contact = $request->contact;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->birthdate = $request->birthdate;
        $student->birthplace = $request->birthplace;
        $student->address = $request->address;
        $student->update();
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students');
    }
}
