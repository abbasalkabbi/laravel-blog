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
<div class="bg-white py-24">
    {{--  --}}
</div>
{{-- from my blog End --}}
@endsection
