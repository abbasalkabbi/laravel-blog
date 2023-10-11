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
        Save Name
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
            Save Password
        </button>
    </form>
    {{-- change Password end --}}
    {{-- change img  --}}
    <form action="{{route("profile.update",$user->id)}}" method="post" enctype="multipart/form-data"  class="container mx-auto flex flex-col  items-start	">
        @csrf
        @method("PUT")
        <h1 class="my-2 text-3xl">
            Change Image
        </h1>
        {{-- input img --}}
        <label  
        class="
        btn border border-indigo-500 py-4 px-4 font-bold cursor-pointer text-gray-100 bg-blue-500 capitalize w-40 text-center my-5
        hover:text-blue-500 hover:bg-gray-100
        "
        >
            <input type="file" hidden name="img">
            Add image 
        </label>
        {{-- input img --}}
        <button type="submit" class="bg-green-700 text-gray-100 hover:bg-green-500 py-4 px-6 my-4">
            Save image
        </button>
    </form>
    {{-- change img end --}}
</div>
@endsection