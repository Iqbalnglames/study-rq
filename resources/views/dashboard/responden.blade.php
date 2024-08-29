@extends('layouts.dashboard_layouts')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl">List Paket Penugasan</h1>
        <div class="mt-10 flex space-x-4">
            <a href="buat-tugas" class="p-2 text-white rounded bg-green-600">buat tugas baru</a>
            <a href="/dashboard/list-tugas" class="p-2 text-white rounded bg-green-600">kembali ke list tugas</a>
            <a href="/penugasan" class="p-2 text-white rounded bg-blue-500">menuju halaman pengerjaan tugas</a>
        </div>
        <div class="space-y-3 w-full mt-5">
            @foreach ($questionTitle as $title)
                <a href="{{ $title->slug }}/responden"
                    class="flex justify-between p-2 border border-gray-300 rounded hover:bg-gray-100">
                    <h1 class="min-w-96">{{ $title->question_title }}</h1>
                    <div class="">
                        <h1 class="inline">diupdate pada: {{ $title->created_at }}</h1>
                    </div>
                    <button class="hover:bg-gray-300 px-2 rounded hover:border-gray-700">x</button>
                </a>
            @endforeach
        </div>
    </div>
@endsection
