<?php

namespace App\Http\Controllers;

use App\Models\coment;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    public function  Add(Request $request){
        $request->validate([
            'coment_des'=>'required|min:2',
        ]);
        coment::create([
            'des'=>$request->input("coment_des"),
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->input("post_id"),
        ]);
        return redirect()->back();
    }
    public function delete(Request $request){
        $id=$request->input('id');
        $post_id=$request->input('post_id');
        coment::Where([['id',$id],['user_id',auth()->user()->id],['post_id',$post_id]])->delete();
        return redirect()->back();
    }
}
