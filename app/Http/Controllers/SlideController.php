<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\Storage;
use File;


class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('admin.pages.settings.slide',compact('slide'));        
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
        // $this->validate($request, [
        //     'title'=>'required',
        //     'content'=>'required',
        // ]);

        // Handling file upload
        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimg.png';
        }

        $slide = new Slide;
        $slide->title = $request->describe;
        $slide->show = 0;
        $slide->img = $fileNameToStore;
        $slide->link = $request->link;

        $slide->save();

        return redirect('manage/setting/slide'); 
        // return $request->all();
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
        $slide = Slide::find($id);
        $filename = $slide->img; 
        $path = public_path("images/".$filename);
        unlink($path);
        $slide->delete();
        return redirect('manage/setting/slide'); 
    }
    public function hien(Request $request,$id){
        $lib = Slide::findOrFail($id);
        $lib->show = 1;
        $lib->save();
        return redirect('manage/setting/slide'); 
    }

    public function hide(Request $request,$id){
        $lib = Slide::findOrFail($id);
        $lib->show = 0;
        $lib->save();
        return redirect('manage/setting/slide'); 
    }
}
