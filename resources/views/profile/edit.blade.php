@extends('layouts.app')
@section('content')
<div>
    <h1 class="text-center bg-gray-700  text-gray-100 my-1  container mx-auto text-2xl font-bold py-6">
        Edit Profile 
    </h1>
    @if(session()->has('message') && session()->get("staus") == true)
        <div class=" container font-regular relative mb-4 block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100 mx-auto mt-5">
            {{session()->get("message")}}
        </div>
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class=" container font-regular relative mb-4 block w-full rounded-lg bg-red-500 p-4 text-base leading-5 text-white opacity-100 mx-auto mt-5">
            <li>{{ $error }}</li>
        </div>
        @endforeach
    @endif
    {{-- change name  --}}
    <form action="{{route("profile.update",$user->id)}}" method="post" class="container mx-auto flex flex-col  items-start	">
    @csrf
    @method("PUT")
    <h1 class="my-2 text-3xl">
        Change Name : {{$user->name}}
    </h1>
    <input type="text" name="name" id="" class="w-5/6  border-0	 bg-white-200 shadow "  placeholder="To" value="{{old('name')}}">
    <button type="submit" class="bg-green-700 text-gray-100 hover:bg-green-500 py-4 px-6 my-4">
        Save
    </button>
    </form>
    {{-- change name end --}}
    {{-- change Password  --}}
    <form action="{{route("profile.update",$user->id)}}" method="post" class="container mx-auto flex flex-col  items-start	">
        @csrf
        @method("PUT")
        <h1 class="my-2 text-3xl">
            Change Password
        </h1>
        <input type="text" name="password" id="" class="w-5/6  border-0	 bg-white-200 shadow "  placeholder="To">
        <button type="submit" class="bg-green-700 text-gray-100 hover:bg-green-500 py-4 px-6 my-4">
            Save
        </button>
    </form>
    {{-- change Password end --}}
</div>
@endsection