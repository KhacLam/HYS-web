<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

class LibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lib = Library::get();
        return view('admin.pages.settings.lib',compact('lib'));
        // return var_dump($lib);
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
        $this->validate($request, [
            'describe'=>'required',
            'image'=>'image',
            'thumb'=>'image'
        ]);

        // Handling file upload
        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }

        if($request->hasFile('thumb')){
            $fileNameEithEx = $request->file('thumb')->getClientOriginalName();
            $fileThumbToStore = time()."_".$fileNameEithEx;
            $request->file('thumb')->move('images',$fileThumbToStore);
        }

        $lib = new Library;
        $lib->desribe = $request->describe;

        // 1 là ảnh, 0 là video
        if ($request->video == '') {
            $lib->link = $fileNameToStore;
            $lib->img = 1;
            $lib->thumb = '';
        }else{
            $lib->link = $request->video;
            $lib->img = 0;
            $lib->thumb = $fileThumbToStore;
        }
        $lib->status = 0;
        $lib->save();

        return redirect('manage/setting/lib'); 
        // return "Hi";
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
        $lib = Library::find($id);
        if($lib->img == 1){
            $filename = $lib->link; 
            $path = public_path("images/".$filename);
            unlink($path);
        }
        $lib->delete();
        return redirect('manage/setting/lib'); 
    }

    public function hien(Request $request,$id){
        $lib = Library::findOrFail($id);
        $lib->status = 1;
        $lib->save();
        return redirect('manage/setting/lib'); 
    }

    public function hide(Request $request,$id){
        $lib = Library::findOrFail($id);
        $lib->status = 0;
        $lib->save();
        return redirect('manage/setting/lib'); 
    }
}
