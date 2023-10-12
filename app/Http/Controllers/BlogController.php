<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\post;
use Auth;
class BlogController extends Controller
{
    public function index()
    {
        $posts=post::simplePaginate(2);
        return view('blog.index',['posts'=>$posts]);
    }

    public function create()
    {
        return view("blog.create");
    }
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
    public function show($slug)
    {
        $post=post::where("slug",$slug)->first();
        
        if($post  == null){
            abort(404);
        }else{
            return view('blog.page')->with('post',$post);
        }
    }

    public function edit($slug)
    {
        $post=post::where("slug",$slug)->first();
        if($post  == null){
            abort(404);
        }else{
            return view('blog.edit')->with('post',$post);
        }
    }

    public function update(Request $request, $slug)
    {
        // if has image
        if($request->hasFile("post_img")){
            $request->validate([
                'post_title'=>'required|min:8|string',
                'post_des'=>'required|min:8|string',
                'post_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $new_image_name=uniqid().$slug.'.'.$request->post_img->extension(); // get new name for img
            $request->post_img->move(public_path('images'), $new_image_name);// move img to files
            // save to db
            post::Where('slug',$slug)->update([
                'title'=> $request->input('post_title'),
                'des'=> $request->input('post_des'),
                'img_path'=>$new_image_name,
                ]
            );
            return redirect("blog")->with(['massage'=>"update Post"]);
        }else{
            $request->validate([
                'post_title'=>'required|min:8|string',
                'post_des'=>'required|min:8|string',
            ]);
            // save to db
            post::Where('slug',$slug)->update([
                'title'=> $request->input('post_title'),
                'des'=> $request->input('post_des'),
                ]
            );
            return redirect("blog")->with(['massage'=>"update Post"]);
        }
        // end if has image
    }

    public function destroy($slug)
    {

        post::Where('slug',$slug)->delete();
        return $this->index();
    }
    public function like($id){
        $like=like::Where([['user_id',auth()->user()->id],['post_id',$id]])->first();
        if($like == null ){
            like::create([
                'user_id'=>auth()->user()->id,
                'post_id'=>$id,
            ]);
            return redirect()->back();
        }else{
            $like->delete();
            return redirect()->back();
        }
    }
}
