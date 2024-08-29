{{-- masih prototype --}}
@extends('layouts.master')

@section('content')
    <div class="lg:flex lg:flex-1 lg:w-screen overflow-y-clip">
        <nav class="bg-[#1f0797] hidden lg:flex h-screen p-2 flex-col text-white overflow-y-scroll w-60 space-y-4">
            <div class="flex flex-col items-center justify-center space-y-2">
                abcd
            </div>
        </nav>
        <main class="bg-gray-100 lg:w-2/3 px-3 lg:p-0 w-screen overflow-y-scroll lg:overflow-x-hidden break-words">
            <div class="p-[15px] h-screen">
                <h1 class="text-2xl lg:text-5xl font-bold text-center break-words">{{ $material->title }}</h1>
                <h1 class="text-lg lg:text-2xl break-words">{{ $material->classLevel->name }}</h1>
                <a class="underline text-blue-400 hover:text-blue-600 break-words"
                    href="/{{ $material->classLevel->slug }}"><- Kembali</a>
                        <div class="space-x-4 break-words">
                            {!! $material->body !!}
                        </div>
            </div>
        </main>
        <nav class="hidden lg:block">
            Right sidebar
        </nav>
    </div>
@endsection
