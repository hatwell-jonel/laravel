<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('users.index')->with('admins', $admins);
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
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'birthdate' =>  'required',
            'birthplace' => 'required',
            'address' =>'required',
        ]);

        $admin              = new Admin;
        $generator          = Helper::IDGenerator($admin,'admin_id', 3, "ADM");
        $admin->admin_id    = $generator;
        $admin->firstname   = $request->admin_firstname;
        $admin->middlename  = $request->admin_middlename;
        $admin->lastname    = $request->admin_lastname;
        $admin->contact     = $request->admin_contact;
        $admin->email       = $generator."@admin.com";
        $admin->gender      = $request->admin_gender;
        $admin->birthdate   = $request->admin_birthdate;
        $admin->age         = Carbon::parse($request->admin_birthdate)->age; 
        $admin->birthplace  = $request->admin_birthplace;
        $admin->address     = $request->admin_address;
        $admin->save();

        $user               = new User;
        $user->user_level   = "admin";
        $user->account_id   = $generator;
        $user->firstname    = $request->admin_firstname;
        $user->middlename   = $request->admin_middlename;
        $user->lastname     = $request->admin_lastname;
        $user->gender       = $request->admin_gender;
        $user->birthplace   = $request->admin_birthplace;
        $user->birthdate    = $request->admin_birthdate;
        $user->age         = Carbon::parse($request->admin_birthdate)->age; 
        $user->contact      = $request->admin_contact;
        $user->address      = $request->admin_address;
        $user->name         = $request->admin_firstname." " .$request->admin_lastname;
        $user->email        =  $generator."@admin.com";
        $user->password     = Hash::make($generator.$request->admin_lastname);
        $user->save();

        return redirect('/admin/accounts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $admin              = Admin::find($id);
        $admin->firstname   = $request->admin_firstname;
        $admin->middlename  = $request->admin_middlename;
        $admin->lastname    = $request->admin_lastname;
        $admin->contact     = $request->admin_contact;
        $admin->email       = $request->admin_email;
        $admin->gender      = $request->admin_gender;
        $admin->birthdate   = $request->admin_birthdate;
        $admin->age         = Carbon::parse($request->admin_birthdate)->age; 
        $admin->birthplace  = $request->admin_birthplace;
        $admin->address     = $request->admin_address;
        $admin->update();
        return redirect('/admin/accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin_id = $admin->admin_id;
        $user = User::where("account_id", $admin_id)->first();
        // dd($user, $admin,$id,$admin_id);  
        $admin->delete();
        $user->delete();
        return redirect()->back();;
    }
}
