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
        $announcement           = new Announcement;
        $announcement->title    = $request->announcement_title;
        $announcement->detail   = $request->announcement_detail;    
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
        $announcement->title       = $request->announcement_title;
        $announcement->detail       = $request->announcement_detail;
        $announcement->image       = $request->announcement_image;
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
