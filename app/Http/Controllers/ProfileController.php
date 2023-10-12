<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::simplePaginate(1);
        // $data = array();

        // foreach($users as $user ){
        //     array_push($data, 
        //     [
        //         'id' =>$user->id,
        //         'name' =>$user->name,
        //         'email' =>$user->email,
        //         'post_count'=> User::find($user->id)->post->count(),
        //     ]
        // );
        // }
        // // $users=$data;
        // return view("profile.index",['users'=>$data,'link'=>$users]);
        return view("profile.index",['users'=>$users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where("id",$id)->first();
        if($user  == null){
            abort(404);
        }else{
            return view('profile.page')->with('user',$user);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where("id",$id)->first();
        if($user  == null){
            abort(404);
        }else{
            return view('profile.edit')->with('user',$user);
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
        // change name
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required|min:8|max:255',
            ]);
            User::Where('id',$id)->update([
                'name'=>$request->input('name'),
            ]);
            return redirect("profile/$id/edit")->with(["staus"=>true,'message'=>"Update Name To {$request->input('name')}"]);
        }
        // end change name
        // change job_title
        if ($request->has('job_title')) {
            $request->validate([
                'job_title' => 'required|min:8|max:255',
            ]);
            User::Where('id',$id)->update([
                'job_title'=>$request->input('job_title'),
            ]);
            return redirect("profile/$id/edit")->with(["staus"=>true,'message'=>"Update Job Title To {$request->input('job_title')}"]);
        }
        // end change job_title
        // change password
        if ($request->has('password')) {
            $request->validate([
                'password' => 'required|min:8|max:255',
            ]);
            User::Where('id',$id)->update([
                'password'=> Hash::make($request->input('password')),
            ]);
            return redirect("profile/$id/edit")->with(["staus"=>true,'message'=>"Update password To {$request->input('password')}"]);
        }
        // end change password
        // change img 
        if($request->hasFile('img')){
            $request->validate([
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $new_image_name=uniqid().'.'.$request->img->extension(); // get new name for img
            $request->img->move(public_path('avatar'), $new_image_name);// move img to files
            User::Where('id',$id)->update([
                'avatar'=> $new_image_name,
            ]);
            return redirect("profile/$id/edit")->with(["staus"=>true,'message'=>"Update Image "]);
        }
        // change img  End

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
