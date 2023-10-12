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
        {{-- test End  --}}
        {{-- like and unlike --}}
        <div class="like_unlike flex flex-col justify-end 	">
            <div class="flex flex-row justify-end ">
                <form action="{{route("blog.like",$post->id)}}"  method="POST" >
                    @csrf
                    <button type="submit"  
                    class="bg-blue-900 font-blod uppercase text-3xl py-1	text-gray-100 w-40 	mx-1">
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
                    class="bg-red-900 font-blod uppercase text-3xl py-1 	text-gray-100 w-40 mx-1"
                    >
                    @if ($post->isunliked())
                        unliked
                    @else
                        unlike
                    @endif
                </button>
                </form>
            </div>
            <div class="flex flex-row justify-end ">
                <p class="font-blod text-3xl  uppercase mx-2">like:{{$post->like->count()}}</p>
                <p class="font-blod text-3xl uppercase"> unlike:{{$post->unlike->count()}}</p>
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
        <p class="capitalize font-blod text-lg tracking-wide pb-6">
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
                py-4  px-4 mt-6 mb-6 inline-block rounded-lg font-blod uppercase   text-2xl
                place-self-start
                "
            >Edit Post</a>
            <a href="{{route("blog.edit",$post->slug)}}"
                class="
                bg-red-700 hover:bg-gray-500 text-gray-100 hover:text-red-700 border border-red-700	
                py-4  px-4 mt-6 mb-6 inline-block rounded-lg font-blod uppercase   text-2xl
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
</div>
@endsection