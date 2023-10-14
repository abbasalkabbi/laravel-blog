@extends('layouts.app')
@section('content')
<div class="bg-gray-100">
    <div class="grid grid-cols-2 container mx-auto">
        {{-- authoe --}}
        <div class="author flex justify-between items-center px-6 py-6" >
            <a class="capitalize  italic text-gray-500  text-lg font-semibold hover:text-gray-700 grid  grid-cols-2 w-fit	"  href="{{route('profile.show',$post->user->id)}}">
                <img src="/avatars/{{$post->user->avatar}}"  alt="" class="rounded-full " style="width: 80px">
                <ul class="flex flex-col -mx-4 justify-items-center mt-2">
                    <p> By:{{$post->user->name}}</p>
                    <p class=""> {{$post->created_at->diffForHumans();}} </p>
                </ul>
            </a>
        </div>
        {{-- author End --}}
        {{-- test --}}
        {{-- {{dd($post->coments)}} --}}
        {{-- test End  --}}
        {{-- like and unlike --}}
        <div class="like_unlike flex flex-col justify-end 	">
            <div class="flex flex-row justify-end ">
                @if(Auth::check())
                <form action="{{route("blog.like",$post->id)}}"  method="POST" >
                    @csrf
                    <button type="submit"  
                    class="bg-blue-900 font-bold uppercase text-3xl py-1	text-gray-100 w-40 	mx-1">
                    @if ($post->isliked())
                        liked
                    @else
                        like
                    @endif
                    </button>
                </form>
                <form action="{{route("blog.unlike",$post->id)}}"  method="POST" >
                    @csrf
                    <button type="submit"  
                    class="bg-red-900 font-bold uppercase text-3xl py-1 	text-gray-100 w-40 mx-1"
                    >
                    @if ($post->isunliked())
                        unliked
                    @else
                        unlike
                    @endif
                </button>
                </form>
                @endif
                
            </div>
            <div class="flex flex-row justify-end ">
                <p class="font-bold text-3xl  uppercase mx-2">like:{{$post->like->count()}}</p>
                <p class="font-bold text-3xl uppercase"> unlike:{{$post->unlike->count()}}</p>
            </div>
        </div>
        {{-- like and unlike end --}}
    </div>
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
        <p class="capitalize font-bold text-lg tracking-wide pb-6">
            {{$post->des}}
        </p>
    </div>
    {{-- des end --}}
    {{-- edit  --}}
    @if (Auth::user() && Auth::user()->id == $post->user_id)
        <div class="container mx-auto">
            <a href="{{route("blog.edit",$post->slug)}}"
                class="
                bg-green-700 hover:bg-gray-500 text-gray-100 hover:text-green-700 border border-green-700	
                py-4  px-4 mt-6 mb-6 inline-block rounded-lg font-bold uppercase   text-2xl
                place-self-start
                "
            >Edit Post</a>
            <a href="{{route("blog.edit",$post->slug)}}"
                class="
                bg-red-700 hover:bg-gray-500 text-gray-100 hover:text-red-700 border border-red-700	
                py-4  px-4 mt-6 mb-6 inline-block rounded-lg font-bold uppercase   text-2xl
                place-self-start
                "
                onclick="event.preventDefault();
                document.getElementById('delete-form').submit();"
            >Delete Post</a>
            <form id="delete-form" action="{{ route('blog.destroy',$post->slug) }}" method="POST" class="hidden">
                @csrf
                @method("DELETE")
            </form>
        </div>
        
    @endif
    {{-- end edit --}}
    {{--  coment --}}
    <div class="coments">
        <h1 class="container mx-auto text-center bg-gray-600 font-bold text-6xl rounded-lg text-gray-100 py-5" >
            Coments
        </h1>
        @if (Auth::user() )
        {{-- Add -comrnt --}}
        <form action="{{route('AddComent')}}" method="POST" class=" container mx-auto flex flex-row items-center relative my-2">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}" class="w-0">
            <textarea name="coment_des" id="" cols="30" rows="10" class="w-full		  border-0 h-20	 bg-white-200 shadow "></textarea>
            <button type="submit" class="bg-blue-900 px-6 h-20 absolute top-0 right-0 z-50	 font-bold text-2xl text-gray-100">Post</button>
        </form>
        @endif
        {{-- end add coment --}}
        {{-- show coment --}}
        <ul class="container mx-auto bg-gray-300">
            @foreach ($post->coments as $coment)
                <li class="border-2 border-inherit w-full">
                    {{-- author --}}
                    <div class="author flex flex-row justify-between px-2 py-2" >
                        {{-- avatar --}}
                        <a href="{{route('profile.show',$coment->user->id)}}" class="flex flex-row items-center">
                            <img  
                            src="/avatars/{{$coment->user->avatar}}" alt=""
                            class="w-12 rounded-full"
                            >
                            <span class="mx-2 hover:text-gray-400">
                                {{$coment->user->name}}
                            </span>
                        </a>
                        {{-- end avatar --}}
                        {{-- creted at --}}
                        <div class="created_at">
                            <p>
                                <p class=""> {{$coment->created_at->diffForHumans();}} </p>
                            </p>
                        </div>
                        {{-- creted at End  --}}
                    </div>
                    {{-- author End --}}
                    <div class="">
                        <p class="py-2 px-2">
                            {{$coment->des}}
                        </p>
                    </div>
                    @if(Auth::check() && Auth::user()->id == $coment->user_id)
                    <form action="{{route('deletecoment')}}" method="POST" id="delete">
                    @csrf
                    <input type="hidden" name="id" value="{{$coment->id}}">
                    <input type="hidden" name="post_id" value="{{$coment->post_id}}">
                    </form>
                    <div class="but-grb flex flex-row justify-end mt-2">
                        <button class="bg-red-900 font-bold text-lg  text-gray-100 mx-1 py-1 px-1 hover:text-gray-900 uppercase"   
                        onclick="event.preventDefault();document.getElementById('delete').submit();"
                        >
                        Delete
                        </button>
                        <button class="bg-green-900 font-bold text-lg  text-gray-100 mx-1 py-1 px-1 hover:text-gray-900 uppercase">Edit</button>
                    </div>
                    @endif
                </li>
            @endforeach
        </ul>
        {{-- show coment End  --}}
    </div>
    {{--  coment End  --}}
</div>
@endsection