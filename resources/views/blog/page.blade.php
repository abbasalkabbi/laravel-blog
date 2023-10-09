@extends('layouts.app')
@section('content')
<div class="bg-gray-100">
    {{-- authoe --}}
    <div class="author container mx-auto   flex justify-between items-center px-6 py-6" >
        <a class="capitalize  italic text-gray-500  text-lg font-semibold hover:text-gray-700 " href="/user/{{$post->user->id}}">
            By:{{$post->user->name}}
        </a>
        <span class="capitalize  italic text-gray-500  text-lg font-semibold ">
            {{$post->created_at->diffForHumans();}} 
        </span>
    </div>
    {{-- author End --}}
    {{-- title --}}
    <div class="title container mx-auto text-center capitalize ">
        <h1 class="text-4xl  font-serif tracking-wide  text-gray-700">
            {{$post->title}}
        </h1>
    </div>
    {{-- end title --}}
    {{-- img --}}
    <div class="img container mx-auto  ">
        <img src="../images/{{$post->img_path}}" alt=""  class="mt-4" style="width: 100%">
    </div>
    {{-- img End --}}
    {{-- des --}}
    <div class="des  container mx-auto py-6">
        <p class="capitalize font-blod text-lg tracking-wide pb-6">
            {{$post->des}}
        </p>
    </div>
    {{-- des end --}}
    {{-- edit  --}}
    @if (Auth::user()->id == $post->user_id)
        <div class="container mx-auto">
            <a href="{{route("blog.edit",$post->slug)}}"
                class="
                bg-green-700 hover:bg-gray-500 text-gray-100 
                py-4  px-4 mt-6 mb-6 inline-block rounded-lg font-blod uppercase   text-2xl
                place-self-start
                "
            >Edit Post</a>
        </div>
        
    @endif
    {{-- end edit --}}
</div>
@endsection