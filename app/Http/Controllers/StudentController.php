<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Helpers\Helper;
use PHPUnit\TextUI\Help;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Validator;

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
        // $validator = Validator::make($request->all(), [
        //     'firstname' => ['required', 'string', 'max:255','min:2'],
        //     'middlename' => ['required', 'string', 'max:255','min:2'],
        //     'lastname' => ['required', 'string', 'max:255','min:2'],
        //     'contact' => 'required',
        //     'gender' => 'required',
        //     'birthplace' => 'required',
        //     'birthdate' => 'required',
        //     'address' => 'required',
        // ]);


        // if($validator->fails()){
        //     // return redirect()->back();
        //     return response()->json(['status' => 0, 'error'=>$validator->errors()->toArray()]);
        // }else{
            
        //     $student    = new Student;
        //     $generator  = Helper::IDGenerator($student,'student_id', 5, date('Y'));
            
        //     $values = [
        //         'student_id'    => $generator,
        //         'firstname'     => $request->firstname,
        //         'middlename'    => $request->middlename,
        //         'lastname'      => $request->firstname,
        //         'contact'       => $request->contact,
        //         'email'         => $request->email,
        //         'gender'        => $request->gender,
        //         'birthplace'    => $request->birthplace,
        //         'birthdate'     => $request->birthdate,
        //         'age'           => Carbon::parse($request->birthdate)->age,
        //         'address'       => $request->address,
        //     ];

        //     $query = DB::table('students')->insert($values);

        //     if($query){
        //         return response()->json(['status' => 1, 'msg' => 'Added Successfully.']);
        //     }
        // }   
       
        // return redirect('/admin/application');

        // ======================================================
       
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'contact' => 'required',
        ]);
        
        $student    = new Student;
        $generator  = Helper::IDGenerator($student,'student_id', 5, date('Y'));

        // $years = Carbon::parse($request->birthdate)->age

        $student->student_id    = $generator;
        $student->firstname     = $request->firstname;
        $student->middlename    = $request->middlename;
        $student->lastname      = $request->lastname;
        $student->contact       = $request->contact;
        $student->email         = $request->email;
        $student->gender        = $request->gender;
        $student->birthdate     = $request->birthdate;
        $student->birthplace    = $request->birthplace;
        $student->address       = $request->address; 
        $student->age           = Carbon::parse($request->birthdate)->age; 
        $student->save();

        
        $user                   = new User;
        $user->user_level       = "student";
        $user->account_id       = $generator;
        $user->firstname        = $request->firstname;
        $user->middlename       = $request->middlename;
        $user->lastname         = $request->lastname;
        $user->gender           = $request->gender;
        $user->birthplace       = $request->birthplace;
        $user->birthdate        = $request->birthdate;
        $user->contact          = $request->contact;
        $user->address          = $request->address;
        $user->name             = $request->firstname. ' ' . $request->lastname;
        $user->email            = $request->email;
        $user->password         = Hash::make($generator.$request->lastname);
        $user->image            = 'images/default_profile/user.png';
        $user->age           = Carbon::parse($request->birthdate)->age; 
        $user->save();

        // return redirect('/students')->with("message", 'Created');

        return redirect()->back();
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
        $student                = Student::find($id);
        $student->firstname     = $request->firstname;
        $student->middlename    = $request->middlename;
        $student->lastname      = $request->lastname;
        $student->contact       = $request->contact;
        $student->email         = $request->email;
        $student->gender        = $request->gender;
        $student->birthdate     = $request->birthdate;
        $student->age           = Carbon::parse($request->birthdate)->age; 
        $student->birthplace    = $request->birthplace;
        $student->address       = $request->address;
        $student->update();
        return redirect()->back();
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
        $student_id = $student->student_id;
        $user = User::where("account_id", $student_id)->first();
        $student->delete();
        $user->delete();
        return redirect()->back();
    }

}
