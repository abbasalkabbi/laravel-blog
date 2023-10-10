@extends('layouts.app')
@section("content")
<div>
    <h1 class="text-center">Profile</h1>
    {{-- {{dd($users)}} --}}
    @foreach ($users as $user)
    <h1>

        {{$user['name']}}
        {{$user['post_count']}} 
    </h1>
    @endforeach
</div>
@endsection