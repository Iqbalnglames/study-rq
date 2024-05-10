@extends('layouts.master')

@section('content')
    <div class="flex flex-1 w-screen">
        <nav class="bg-[#1f0797] h-screen p-2 flex flex-col text-white overflow-y-scroll w-60 space-y-4">
            {{-- @foreach($materialList as $material)
                <a href=""> {{$material->title}} </a>
            @endforeach --}}
        </nav>
        <main class="bg-gray-100 w-2/3 overflow-x-hidden"> 
            <div class="p-[15px] h-screen">
                <h1 class="text-5xl font-bold text-center">{{ $material->title }}</h1>
                <h1 class="text-2xl">{{ $material->classLevel->name }}</h1> 
                <div class="space-x-4">
                    {!! $material->body !!}
                </div>
            </div>
        </main>

        <nav class=" overflow-y-clip">
            Right sidebar
        </nav>
    </div>
@endsection
