<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\post;
use Auth;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all();
        return view('blog.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title'=>'required|min:8|string',
            'post_des'=>'required|min:8|string',
            'post_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slug = Str::of($request->post_title)->slug('_');// get slug for post 
        $new_image_name=uniqid().$slug.'.'.$request->post_img->extension(); // get new name for img
        $request->post_img->move(public_path('images'), $new_image_name);// move img to files
        $user_id=auth()->user()->id;
        // save to db
        $post =new post();
        $post->slug =$slug;
        $post->title =$request->input('post_title');
        $post->des =$request->input('post_des');
        $post->img_path= $new_image_name;
        $post->user_id =$user_id;
        $post->save();
        
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post=post::where("slug",$slug)->first();
        if($post  == null){
            abort(404);
        }else{
            return view('blog.page')->with('post',$post);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post=post::where("slug",$slug)->first();
        if($post  == null){
            abort(404);
        }else{
            return view('blog.edit')->with('post',$post);
        }
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
