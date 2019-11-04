<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Comments;
use App\Message;

class AdminController extends Controller
{
    public function index(){
        $number = DB::select('select * from posts');
        $totalView = DB::table('posts')->sum('viewcount');
        $totalPost = count($number);
        $totalComment = count(DB::select('select * from comments'));
        $totalMes = count(DB::select('select * from messages'));
        $post = DB::table('posts')->orderBy('viewcount', 'desc')->limit(5)->get();
        return view('admin.pages.dashboard',compact('totalPost','totalView','totalComment','post','totalMes'));
    }
    
    public function message(){
        $mes = Message::all();
        return view('admin.pages.users.message',compact('mes'));
    }

    public function mesde($id){
        $mes = Message::find($id);
        $mes->delete();
        return redirect('manage/message'); 
    }

    public function slideCreate(Request $request){
        
    }
}
