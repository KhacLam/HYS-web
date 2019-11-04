<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = club::all();
        return view('admin.pages.club.index',compact('club'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.club.create');        
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
            'name'=>'required',
            'area'=>'required',
            'num'=>'required',
            'content'=>'required',
        ]);
        
        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimg.png';
        }

        $club = new club;
        $club->club_name = $request->name;
        $club->area = $request->area;
        $club->numberOfMem = $request->num;
        $club->introduction = $request->content;
        $club->club_image = $fileNameToStore;
        $club->club_slug = str_slug($request->name);

        $club->save();

        return redirect('manage/setting/club'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = club::findOrFail($id);
        return view('admin.pages.club.show',compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = club::findOrFail($id);
        return view('admin.pages.club.edit',compact('club'));
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
        // $this->validate($request, [
        //     'title'=>'required',
        //     'content'=>'required',
        // ]);

        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimg.png';
        }

        $club = club::findOrFail($id);
        $club->club_name = $request->name;
        $club->area = $request->area;
        $club->numberOfMem = $request->num;
        $club->introduction = $request->content;
        $club->club_image = $fileNameToStore;
        $club->club_slug = str_slug($request->name);

        $club->save();
        return redirect('manage/setting/club'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = club::find($id);
        $club->delete();
        return redirect('manage/setting/club'); 
    }
}
