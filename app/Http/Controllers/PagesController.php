<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $posts=post::orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        // dd($posts);
        return view('home',['posts'=>$posts]);
    }
}
