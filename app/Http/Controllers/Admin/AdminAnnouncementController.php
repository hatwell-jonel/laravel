<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Announcement;

class AdminAnnouncementController extends Controller
{
    public function store(Request $request){
        $announcement                   = new Announcement;
        $announcement->title            = $request->announcement_title;
        $announcement->detail           = $request->announcement_detail;    
        $announcement->start_date       = $request->announcement_start;
        $announcement->end_date         = $request->announcement_end;

        if($request->hasFile('announcement_image')){
            $imagename = 'image-'. time()  . '.' . $request->announcement_image->guessExtension();
            $request->announcement_image->move(public_path('images'), $imagename);
            $announcement->image    = $imagename;
        }else{
            $announcement->image    = null;
        }
        
        $announcement->save();
        return redirect()->back();
    }


    public function update(Request $request, $id){
        $announcement              = Announcement::find($id);
        $announcement->title       = $request->announcement_update_title;
        $announcement->detail      = $request->announcement_update_detail;
        $announcement->start_date      = $request->announcement_update_start;    
        $announcement->end_date  = $request->announcement_update_end;

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
