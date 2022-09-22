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


        //guessExtension()
        //getMimeType()
        //getSize()
        //getClientOriginalName()

        // $name = $request->file('announcement_image')->getClientOriginalName();
        // $test = $request->file('announcement_image')->guessExtension();
        // $imagename = time() . '-' .  $request->announcement_title . '.' . $request->announcement_image->guessExtension();
        // dd($imagename);  

        // $request->announcement_image->store('images');

        $announcement           = new Announcement;
        $request->file('announcement_image')->store('public/images');
        
        // ===============================================================
        // $request->file('announcement_image')->store('images', 'public');
        // $announcement           = new Announcement;
        $announcement->title    = $request->announcement_title;
        $announcement->detail   = $request->announcement_detail;
        $announcement->image    = $request->announcement_image;
        $announcement->save();
        return redirect('/admin/announcement');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
