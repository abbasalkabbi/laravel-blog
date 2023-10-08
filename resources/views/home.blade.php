@extends('layouts.app')

@section('content')
<style>
    .hero-bg-img{
        background: url('https://picsum.photos/id/270/4434/3729')no-repeat fixed center ; background-clip: border-box;   background-size: cover;
        height: 600px;
    }
</style>
{{-- hero --}}
<div class="hero-bg-img flex flex-col items-center capitalize text-gray-100 font-blod 	  justify-center">
    <h1 class="text-4xl ">
        Welcome to my blog
    </h1>
    <a href="" class="rounded-lg  border bg-gray-100 text-black text-2xl border-slate-950 p-3 mt-4">
        read more
    </a>
</div>
{{-- end hero --}}
{{-- from my blog --}}
<div class="bg-white ">

    <h1 class="uppercase text-4xl  text-center">Posts From blog</h1>
@foreach ($posts as $post)
    

    {{-- post --}}
    <div class="post container  sm:grid  grid-cols-2 gap-16 mx-auto p-15 m-5 ">
        {{-- img --}} 
        <div class="img-post mx-2 md:mx-0">
            <img src="{{$post->img_path}}" alt="" class="sm:rounded-lg">
        </div>
        {{-- img End  --}}
        {{-- content-post --}}
        <div class="content-post flex flex-col items-left justify-center m-10 sm:m-0">
            <h2 class="title-post uppercase text-gray-700 font-bold text-4xl" >{{$post->title}}</h2>
            <a class="title-post  text-gray-400 text-lg italic py-4 hover:text-gray-700	"   href="/user/{{$post->user->id}}">By:{{$post->user->name}}</a>
            <span class="title-post  text-gray-400 text-lg italic  hover:text-gray-700	"  >{{$post->created_at->diffForHumans();}}   </span>
            <p class="text-gray-500 text-sm font-bold py-5 leading-relaxed">
                {{substr($post->des, 0, 150);}}...
            </p>
            <a href="/blog/{{$post->slug}}" class="rounded-lg   bg-gray-700  text-2xl  text-gray-100 py-2 px-3  font-blod uppercase place-self-start hover:bg-gray-500">
                read more
            </a>
        </div>
        {{--End content-post --}} 
    </div>
    {{-- end post --}}
    <div class="border-b-2 border-gray-400	container mx-auto mb-2">hi</div>
@endforeach
</div>
{{-- from my blog End --}}
@endsection
