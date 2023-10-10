@extends('layouts.app')
@section("content")
<div>
    <h1 class="text-center">Profile</h1>
    <div class="   w-screen container mx-auto ">
        {{-- user --}}
        <div class="w-full" >
            <div class="bg-white shadow-xl rounded-lg py-3 mx-2">
                <div class="photo-wrapper p-2">
                    <img class="w-100 h-32  mx-auto" src="https://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f?s=261&d=mp" alt="John Doe">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-2xl text-gray-900 font-medium leading-8 ">{{$user['name']}}</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p>Web Developer</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold text-lg">posted:</td>
                            <td class="px-2 py-2 text-lg">{{$user->post()->count()}} </td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold text-lg">Phone</td>
                            <td class="px-2 py-2 text-lg">+977 9955221114</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold  text-lg">Email</td>
                            <td class="px-2 py-2 text-lg">{{$user['email']}}</td>
                        </tr>
                    </tbody></table>
                    @if(Auth::user())
                    <a href="{{route("profile.edit",$user->id)}}" class="rounded-lg  mt-15 bg-green-700  text-2xl  text-gray-100 py-2 px-3  font-blod uppercase place-self-start hover:bg-green-500">
                        Edit
                    </a>
                    @endif
                </div>
            </div>
        </div>
        {{-- end user --}}
    </div>
    <div class="posts w-screen ">
        <div class="text-center bg-gray-700  text-gray-100 my-4 rounded-lg container mx-auto text-2xl font-bold py-6"> Posts</div>
        @if($user->post()->count() == 0)
        <h1 class="container text-lg uppercase text-center mx-auto h-50 h-40">
            theres no post
        </h1>
        @endif
        @foreach($user->post()->get() as $post)
        {{-- post --}}
        <div class="post container  sm:grid  grid-cols-2 gap-16 mx-auto p-15 m-5 ">
            {{-- img --}} 
            <div class="img-post mx-2 md:mx-0">
                <img src="../images/{{$post->img_path}}" alt="" class="sm:rounded-lg">
            </div>
            {{-- img End  --}}

            {{-- content-post --}}
            <div class="content-post flex flex-col items-left justify-center m-10 sm:m-0">
                <h2 class="title-post uppercase text-gray-700 font-bold text-4xl" >{{$post->title}}</h2>
                <a class="title-post  text-gray-400 text-lg italic py-4 hover:text-gray-700	"   href="{{route('profile.show',$post->user->id)}}">By:{{$post->user->name}}</a>
                <span class="title-post  text-gray-400 text-lg italic 	"  >{{$post->created_at->diffForHumans();}}   </span>
                <p class="text-gray-500 text-sm font-bold py-5 leading-relaxed">
                    {{substr($post->des, 0, 150);}}...
                </p>
                <a href="{{route("blog.show",$post->slug)}}" class="rounded-lg   bg-gray-700  text-2xl  text-gray-100 py-2 px-3  font-blod uppercase place-self-start hover:bg-gray-500">
                    read more
                </a>
            </div>
            {{--End content-post --}} 
        </div>
        {{-- end post --}}
        @endforeach
    </div>
</div>
@endsection