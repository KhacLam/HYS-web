<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infor;

class SettingController extends Controller
{

    public function edit($id)
    {
        $infor = Infor::find(1);
        return view('admin.pages.settings.infor',compact('infor'));
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
        $fileNameToStore = "";
        if($request->hasFile('logo')){
            $fileNameEithEx = $request->file('logo')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('logo')->move('images',$fileNameToStore);
        }

        $infor = Infor::findOrFail($id);
        $infor->name = $request->name;
        $infor->phone = $request->phone;
        $infor->email = $request->email;
        $infor->facebook = $request->facebook;
        $infor->intro = $request->intro;
        $infor->address = $request->address;
        if ($request->hasFile('logo')) {
            $infor->logo = $fileNameToStore;
        }

        $infor->save();
        return redirect('manage/setting/infor/1/edit'); 
        // return $request->all();
    }
}
