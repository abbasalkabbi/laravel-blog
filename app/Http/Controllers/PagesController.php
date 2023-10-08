<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $posts=post::all();
        // dd($posts);
        return view('home',['posts'=>$posts]);
    }
}
