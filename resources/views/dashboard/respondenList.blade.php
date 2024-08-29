@extends('layouts.dashboard_layouts')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl">List Paket Penugasan</h1>
        <div class="mt-10 flex space-x-4">
            <a href="buat-tugas" class="p-2 text-white rounded bg-green-600">buat tugas baru</a>
            <a href="{{ url()->previous() }}" class="p-2 text-white rounded bg-green-600">kembali ke paket tugas</a>
            <a href="/penugasan" class="p-2 text-white rounded bg-blue-500">menuju halaman pengerjaan tugas</a>
        </div>
        <div class="space-y-3 w-full mt-5">
            @if ($attendances->isEmpty())
            <h1>Belum ada yang mengerjakan soal</h1>
        @endif
            @foreach ($attendances as $attendance)
                <a href="{{ $attendance->name }}/responden"
                    class="flex justify-between p-2 border border-gray-300 rounded hover:bg-gray-100">
                    <h1 class="min-w-96">{{ $attendance->name }}</h1>
                    @foreach ($attendance->images as $image)
                        <img src="{{ asset('/storage/answers/' . $image->image) }}" width="200" alt="">
                    @endforeach
                    <div class="">
                        <h1 class="inline">diupdate pada: {{ $attendance->updated_at }}</h1>
                    </div>
                    <button class="hover:bg-gray-300 px-2 rounded hover:border-gray-700">x</button>
                </a>
            @endforeach
        </div>
    </div>
@endsection
