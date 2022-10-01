<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Announcement;

class AdminAnnouncementController extends Controller
{
    public function store(Request $request){
        // dd($request->all());

        // OK WITH SINGLE IMAGE =================================================
        // $imageName  = time() . '-' . $request->announcement_title .'.'. $request->announcement_image->guessClientExtension();
        // $request->announcement_image->move(public_path('images\announcement'), $imageName);
        // $announcement->image            = $imageName;
        // ======================================================================


        $image = array();
        if($files = $request->file('announcement_image')){
            foreach($files as $file){
                $image_name = md5(rand(10,1000));
                $ext = strtolower($file->guessClientExtension());
                $image_fullname = $image_name . '.' . $ext;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_fullname;
                $file->move(public_path($upload_path), $image_fullname);
                $image[] = $image_url;
            }
        }
        $announcement                   = new Announcement;
        $announcement->title            = $request->announcement_title;
        $announcement->detail           = $request->announcement_detail;    
        $announcement->start_date       = $request->announcement_start;
        $announcement->end_date         = $request->announcement_end;
        $announcement->image            = implode('|', $image);
        $announcement->save();
        return redirect()->back();
    }


    public function update(Request $request, $id){



        $announcement              = Announcement::find($id);
        $announcement->title       = $request->announcement_update_title;
        $announcement->detail      = $request->announcement_update_detail;
        $announcement->start_date  = $request->announcement_update_start;    
        $announcement->end_date    = $request->announcement_update_end;
        $image = array();
        if($files = $request->file('announcement_update_image')){
            foreach($files as $file){
                $image_name = md5(rand(10,1000));
                $ext = strtolower($file->guessClientExtension());
                $image_fullname = $image_name . '.' . $ext;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_fullname;
                $file->move(public_path($upload_path), $image_fullname);
                $image[] = $image_url;
            }
        }
        $announcement->image       = implode('|', $image);
        $announcement->update();    
        return redirect()->back();
    }


    public function destroy($id){
        $announcement = Announcement::find($id);
        // $student_id = $student->student_id;
        // $user = User::where("account_id", $student_id)->first();
        $announcement->delete();
        // $user->delete();
        return redirect()->back();
    }
}
