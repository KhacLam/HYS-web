<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Posts;
use App\Categories;

class AdPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // đếm số bài viết
        $number = DB::select('select * from posts');
        $numbers = count($number);
        
        $posts = Posts::orderBy('created_at','desc')->paginate(5);
        return view('admin.pages.posts.list',compact('posts','numbers'));
        // return $number;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.pages.posts.create',compact('categories'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required',
        ]);

        // Handling file upload
        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimg.png';
        }

        $post = new Posts;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->user_id = auth()->user()->id;
        $post->p_image = $fileNameToStore;
        $post->p_slug = str_slug($request->title);

        $post->save();

        Session::flash('success','Done');
        return redirect('manage/post'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);
        $cate_id = $post->category_id;
        $category = Categories::find($cate_id);
        return view('admin.pages.posts.show',compact('post','category'));
    }

    public function single($slug){
        $post = Posts::where('p_slug',$slug)->first();
        $cate_id = $post->category_id;
        $category = Categories::find($cate_id);
        // return $post;
        return view('admin.pages.posts.show',compact('post','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        $categories = Categories::all();
        return view('admin.pages.posts.edit',compact('post','categories'));
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
        // validate data
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required',
        ]);

        // Handling file upload
        $fileNameToStore = "";
        if($request->hasFile('image')){
            $fileNameEithEx = $request->file('image')->getClientOriginalName();
            $fileNameToStore = time()."_".$fileNameEithEx;
            $request->file('image')->move('images',$fileNameToStore);
        }

        $post = Posts::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->user_id = 1;
        if ($request->hasFile('image')) {
            $post->p_image = $fileNameToStore;
        }
        $post->p_slug = str_slug($request->title);

        $post->save();
        return redirect('manage/post'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        $filename = $post->p_image; 
        $path = public_path("images/".$filename);
        unlink($path);
        $post->delete();
        return redirect('manage/post'); 
    }
}
