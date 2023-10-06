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
@for ($i = 0; $i < 3; $i++)
    {{-- post --}}
    <div class="post container  sm:grid  grid-cols-2 gap-16 mx-auto py-15 m-5">
        {{-- img --}} 
        <div class="img-post mx-2 md:mx-0">
            <img src="https://picsum.photos/id/{{rand(1,100)}}/960/620" alt="" class="sm:rounded-lg">
        </div>
        {{-- img End  --}}
        {{-- content-post --}}
        <div class="content-post flex flex-col items-left justify-center m-10 sm:m-0">
            <h2 class="title-post uppercase text-gray-700 font-bold text-4xl" >How clkszm apd, olams</h2>
            <p class="text-gray-500 text-sm font-bold py-5 leading-relaxed">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Natus odio laboriosam nulla dolore non debitis nobis dolorum, e
                xpedita dignissimos numquam, dolores, dolorem molestiae.
            </p>
            <a href="" class="rounded-lg   bg-gray-700  text-2xl  text-gray-100 py-2 px-3  font-blod uppercase place-self-start ">
                read more
            </a>
        </div>
        {{--End content-post --}} 
    </div>
    {{-- end post --}}
@endfor
</div>
{{-- from my blog End --}}
@endsection
