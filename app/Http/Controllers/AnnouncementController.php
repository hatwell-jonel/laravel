<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        //getMimeType()
        //getSize()
        //getClientOriginalName()

        // dd($request->all());

        // $images = array();
        // if($files = $request->file('announcement_image')){
        //     foreach($files as $file){
        //         $imagename      = md5(rand(1000,10000));
        //         $ext            = strtolower($file->getClientOriginalExtension());
        //         $image_fullname = $imagename.'.'.$ext;
        //         $upload_path    =   'images/announcement/';
        //         $image_url      = $upload_path.$image_fullname;
        //         $file->move($upload_path, $image_fullname);
        //         $images[]       = $image_url;
        //     }
        // }


        // // $announcement           = new Announcement;
        // Announcement::insert([
        //     'title' => $request->announcement_title,
        //     'detail' =>  $request->announcement_detail,
        //     'image' => implode('|', $images),
        // ]);

        // // dd($images);

        // return back();


        //==========================
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
        return Announcement::find($id);
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
        $announcement              = Announcement::find($id);
        $announcement->title       = $request->announcement_update_title;
        $announcement->detail      = $request->announcement_update_detail;
        $announcement->start_date      = $request->announcement_update_start;    
        $announcement->end_date  = $request->announcement_update_end;

        $announcement->update();    
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
        $announcement = Announcement::find($id);
        $announcement->delete();
        return redirect()->back();
    }
}
