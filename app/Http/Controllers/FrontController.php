<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Library;
use App\Posts;
use App\Infor;
use App\Message;
use App\Comments;
use App\User;
use App\club;
use App\Slide;

class FrontController extends Controller
{

    public function index(){
        $cate = Categories::all();
        $infor = Infor::find(1);
        $club = club::all();
        $slide = Slide::all();
        $clb = club::all();
        $post = DB::table('posts')->orderBy('created_at','desc')->limit(3)->get();
        return view('frontend.pages.home',compact('clb','slide','cate','infor','post','club'));
        // return $slide;
    }
    public function contact(){
        $cate = Categories::all();
        $infor = Infor::find(1);
        $clb = club::all();
        return view('frontend.pages.contact',compact('cate','infor','clb'));
    }
    public function catesingle($id,$slug){
        $cate = Categories::all();
        $infor = Infor::find(1);
        $clb = club::all();
        $category = Categories::find($id);
        $post = Posts::where('category_id','=',$id)->paginate(9);
        return view('frontend.pages.blog',compact('cate','post','category','infor','clb'));
    }
    public function postsingle($slug){
        $cate = Categories::all();
        $post = Posts::where('p_slug','=',$slug)->join('categories','categories.id','=','posts.category_id')->join('users','users.id','=','posts.user_id')->get();
        $infor = Infor::find(1);
        $clb = club::all();
        $id = $post[0]->category_id;
        $category = Categories::find($id);
       
        // Đém số view
        $post_id = Posts::where('p_slug','=',$slug)->get();
        $p_id = $post_id[0]->id;
        if (!Session::has($p_id)) {
            DB::table('posts')->where('id','=',$p_id)->increment('viewcount');
            Session::put($p_id,1);
        }

         // trả về comment
         $comment = DB::select('SELECT * FROM `comments` JOIN users ON comments.user_id = users.id WHERE post_id = ?', [$p_id]);

         $totalComment = count($comment);

        return view('frontend.pages.blog_single',compact('clb','cate','post','category','infor','p_id','comment','totalComment'));
        // return var_dump($post[0]);
    }          
    public function post(){
        $cate = Categories::all();
        $clb = club::all();
        $infor = Infor::find(1);
        $post = Posts::join('categories','categories.id','=','posts.category_id')->paginate(9);
        return view('frontend.pages.blog_def',compact('cate','post','infor','clb'));
    }
    public function search(Request $request){
        $keyword = $request->keyword;
        $cate = Categories::all();
        $clb = club::all();
        $infor = Infor::find(1);
        $post_s = Posts::where('title','like',"%$keyword%")->take(36)->paginate(9);
        return view('frontend.pages.blog_search',compact('post_s','keyword','cate','infor','clb'));
        // return $post;
    }
    public function lib(){
        $cate = Categories::all();
        $infor = Infor::find(1);
        $clb = club::all();
        $lib = Library::all();
        return view('frontend.pages.lib',compact('cate','lib','infor','clb'));
    }

    public function comment($id,Request $request){
        $post_id = $id;

        $baiviet = Posts::find($id);
        
        $comment = new Comments;

        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->message;

        $comment->save();

        return redirect("posts/".$baiviet->p_slug);
        // return $baiviet->p_slug;
    }

    public function about(){
        $clb = club::all();
        $cate = Categories::all();
        $infor = Infor::find(1);
        return view('frontend.pages.about',compact('cate','infor','clb'));
    }

    public function clubsingle($slug){
        $infor = Infor::find(1);
        $clb = club::all();
        $cate = Categories::all();
        $club = club::where('club_slug','=',$slug)->get();
        return view('frontend.pages.club',compact('cate','club','infor','clb'));
        // return $club;
    }

    public function message(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $mes = new Message;
        $mes->name = $request->name;
        $mes->email = $request->email;
        $mes->subject = $request->subject;
        $mes->content = $request->message;
        $mes->save();
        return redirect("");
    }
}
