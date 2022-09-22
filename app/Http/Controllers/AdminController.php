<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        $admin              = new Admin;
        $generator          = Helper::IDGenerator($admin,'admin_id', 3, "ADM");
        $admin->admin_id    = $generator;
        $admin->firstname   = $request->admin_firstname;
        $admin->middlename  = $request->admin_middlename;
        $admin->lastname    = $request->admin_lastname;
        $admin->contact     = $request->admin_contact;
        $admin->email       = $request->admin_email;
        $admin->gender      = $request->admin_gender;
        $admin->birthdate   = $request->admin_birthdate;
        $admin->birthplace  = $request->admin_birthplace;
        $admin->address     = $request->admin_address;
        $admin->save();

        $user               = new User;
        $user->name         = $request->admin_lastname;
        $user->user_level   = "admin";
        $user->email        =  $request->admin_email;
        $user->password     = Hash::make($request->firstname.$request->lastname);
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
        $admin->delete();
        return redirect('/admin/accounts');
    }
}
