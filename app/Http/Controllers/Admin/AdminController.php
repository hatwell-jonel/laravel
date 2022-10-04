<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\MailNotify;
use Mail;


class AdminController extends Controller
{
    public function store(Request $request){
        $generator  = Helper::IDGenerator(new Admin,'admin_id', 3, "ADM");
        $email = $request->admin_email;

        Admin::create([
            'admin_id'    => $generator,
            'firstname'     => $request->admin_firstname,
            'middlename'    => $request->admin_middlename,
            'lastname'      => $request->admin_lastname,
            'contact'       => $request->admin_contact,
            'email'         => $request->admin_email,
            'gender'        => $request->admin_gender,
            'birthdate'     => $request->admin_birthdate,
            'birthplace'    => $request->admin_birthplace,
            'address'       => $request->admin_address,
            'age'           => Carbon::parse($request->admin_birthdate)->age,
        ]);

       $userdata = User::Create([
            'user_level'    => "admin",
            'account_id'    => $generator,
            'firstname'     => $request->admin_firstname,
            'middlename'    => $request->admin_middlename,
            'lastname'      => $request->admin_lastname,
            'contact'       => $request->admin_contact,
            'email'         => $request->admin_email,
            'gender'        => $request->admin_gender,
            'birthdate'     => $request->admin_birthdate,
            'name'          => $request->admin_firstname. " " . $request->admin_lastname,
            'birthplace'    => $request->admin_birthplace,
            'emailVerify_token' => Str::random(60),
            'address'       => $request->admin_address,
            'age'           => Carbon::parse($request->admin_birthdate)->age,
            'password'      => Hash::make($generator.$request->admin_lastname),
        ]);

        Mail::to($email)->send(new MailNotify($userdata));


        return redirect()->back();
    }

    public function update(Request $request, $id){
        $admin                = Admin::find($id);
        $admin->firstname     = $request->update_admin_firstname;
        $admin->middlename    = $request->update_admin_middlename;
        $admin->lastname      = $request->update_admin_lastname;
        $admin->contact       = $request->update_admin_contact;
        $admin->email         = $request->update_admin_email;
        $admin->gender        = $request->update_admin_gender;
        $admin->birthdate     = $request->update_admin_birthplace;
        $admin->age           = Carbon::parse($request->birthdate)->age; 
        $admin->birthplace    = $request->update_admin_birthdate;
        $admin->address       = $request->update_admin_address;
        $admin->update();
        return redirect()->back();
    }

    
    public function destroy($id){
        $admin = Admin::find($id);
        $admin_id = $admin->admin_id;
        $user = User::where("account_id", $admin_id)->first();
        $admin->delete();
        $user->delete();
        return redirect()->back();
    }

}
