
@extends("layouts.app")
@section('content')
<div>
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">Edit  Post</div>
        <style>
            body {background:white !important;}
        </style>
    {{-- form --}} 
    <form  action="{{route('blog.update',$post->slug)}}" method="POST" enctype="multipart/form-data"
    class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl"
    >
    @csrf
    @method("PUT")
        <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" placeholder="Title" type="text" name="post_title" value="{{$post->title}}">

        <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"  
        name="post_des">{{$post->des}}</textarea>
        {{-- input img --}}
        <label  
        class="
        btn border border-indigo-500 py-4 px-4 font-bold cursor-pointer text-gray-100 bg-blue-500 capitalize w-40 text-center my-5
        hover:text-blue-500 hover:bg-gray-100
        "
        >
            <input type="file" hidden name="post_img">
            Add image 
        </label>
        {{-- input img --}}
        <!-- buttons -->
        <div class="buttons flex">
            <div class="
            btn border border-red-500 py-4 px-4 font-bold cursor-pointer text-gray-100 bg-red-500 capitalize w-40 text-center my-5
            mr-2
            hover:text-red-500 hover:bg-gray-100
            "
            >Cancel</div>
            <button type="submit" 
            class="
            btn border border-indigo-500 py-4 px-4 font-bold cursor-pointer text-gray-100 bg-blue-500 capitalize w-40 text-center my-5
            hover:text-blue-500 hover:bg-gray-100
            "
            >Post</button>
        </div>
        {{-- end buttons --}}
    </form>
    {{-- end form --}}
</div>
@endsection