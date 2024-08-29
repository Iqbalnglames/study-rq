@extends('layouts.master')

@section('content')
<div class="px-80">
    <h1 class="mt-4 text-5xl text-center font-bold">{{ $post->title }}</h1>
</div>
<div class="flex justify-around mt-8">
    <div></div>
    <div class="text-left text-2xl pt-2 mx-80 space-y-2 mb-3">
        {!! $post->body !!}
    <a href="/materi" class="hover:text-blue-600 underline  text-blue-400"> <- Kembali Ke Menu Materi</a>
    </div>
    <div></div>
</div>
@endsection