@extends('layouts.dashboard_layouts')

@section('content')
<form method="POST" action="{{ route('/buat-materi') }}">
    @csrf
    <div class="space-y-3">
        <div class="flex flex-col">
            <label for="title">Judul Materi</label>
            <input type="text" class="p-2 rounded-sm w-96 border overflow-x-hidden border-slate-300 focus:ring-blue-500" name="title" value="{{ old('title') }}" placeholder="Tulis judul materi di sini">
        </div>
        <select name="class_level_id" class="w-50 p-2 bg-white border border-slate-300 rounded-sm">
            <option>--Pilih kelas--</option>
            @foreach ($classLevels as $classes)
            <option value="{{$classes->id }}">{{$classes->name}}</option>
        @endforeach
    </select>
    <input id="x" type="hidden" value="{{ old('body') }}" name="body">
    <trix-editor input="x"></trix-editor>
    <button type="submit" class="p-2 rounded-md bg-green-500 border border-slate-300 text-white">Posting Materi</button>
    <a href="/dashboard/list" class="p-2 rounded-md bg-yellow-500 border border-slate-300 ">Kembali</a>
</div>
</form>         
@if($errors->any())
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
@endif
@endsection