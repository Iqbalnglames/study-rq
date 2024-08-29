@extends('layouts.dashboard_layouts')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl">List Paket Penugasan</h1>
        <div class="mt-10 flex space-x-4">
            <a href="buat-tugas" class="p-2 text-white rounded bg-green-600">Buat Tugas Baru</a>
            <a href="responden" class="p-2 text-white rounded bg-green-600">Lihat Responden Tugas</a>
            <a href="/penugasan" class="p-2 text-white rounded bg-blue-500">Menuju Halaman Pengerjaan Tugas</a>
        </div>
        <div class="space-y-3 w-full mt-5">
            @foreach ($taskTitle as $title)
                <div onclick="window.location.href='edit-tugas/{{ $title->slug }}'"
                    class="cursor-pointer flex justify-between p-2 border border-gray-300 rounded hover:bg-gray-100">
                    <h1 class="min-w-96">{{ $title->question_title }}</h1>
                    <p>Diupdate pada: {{ $title->updated_at }}</p>
                    <a href="hapus-tugas/{{ $title->slug }}" class="hover:bg-gray-300 px-2 rounded hover:border-gray-700">
                        x
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
