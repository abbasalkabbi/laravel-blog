@extends('layouts.app')
@section("content")
<div>
    <h1 class="text-center">Profile</h1>
    {{-- {{dd($users['links'])}} --}}
    
    {{-- <h1>

        {{$user['name']}}
        {{$user['post_count']}} 
    </h1> --}}
    <div class="flex  h-screen container mx-auto ">
        @foreach ($users as $user)
        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3 mx-2">
                <div class="photo-wrapper p-2">
                    <img class="w-32 h-32 rounded-full mx-auto" src="avatars/{{$user->avatar}}" alt="John Doe">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{$user->name}}</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p class="uppercase">{{$user->job_title}}</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">posted:</td>
                            <td class="px-2 py-2">{{$user->post()->count()}} </td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">created Since</td>
                            <td class="px-2 py-2">{{$user->created_at->diffForHumans();}}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                            <td class="px-2 py-2">{{$user->email}}</td>
                        </tr>
                    </tbody></table>
        
                    <div class="text-center my-3">
                        <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium" href="{{route('profile.show',$user['id'])}}">View Profile</a>
                    </div>
        
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="container mx-auto my-6">
        {{ $users->links() }}
    </div>


</div>
@endsection