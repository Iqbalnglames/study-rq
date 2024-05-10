@extends('layouts.master')

@section('content')
<div style="background-image: url('{{ asset('images/class-bg.jpg') }}'); " class="h-screen bg-cover z-0 relative">
    <div class="bg-black h-screen bg-opacity-60">
        <h1 class="text-center text-2xl font-bold py-4 text-white">Pilih materi</h1>
        <div class="grid grid-cols-4 gap-y-10 px-10 mb-10 place-items-center">
            @foreach($materials as $material)
            <a href="/{{ $material->classLevel->slug }}/{{ $material->slug }}">
                <div class="flex hover:bg-gray-100 bg-white flex-col w-52 h-56 shadow-xl items-center rounded-md border border-gray-200">
                    <img class="rounded-t-md" src="{{ asset('images/book-bg.jpg') }}" alt="gambar-buku">
                    <h1 class="text-center">{{ $material->title }}</h1>
                </div>
            </a>
        @endforeach
    </div>
    <div class="grid grid-rows-1 place-items-center">
        <a href="/kelas"
        type="button"
        class="rounded border-2 border-neutral-50 px-7 pb-[8px] pt-[10px] text-sm font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
        >
        Kembali ke menu Kelas
    </a>
</div>
</div>
</div>
@endsection