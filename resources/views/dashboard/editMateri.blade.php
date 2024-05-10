@extends('layouts.dashboard_layouts')

@section('content')
<form method="POST" >
    @csrf
    <div class="space-y-3">
        <div class="flex flex-col">
            <label for="title">Judul Materi</label>
            <input type="text" class="p-2 rounded-sm w-96 border border-slate-300 focus:ring-blue-500" name="title" placeholder="Tulis judul materi di sini" value="{{$editMateri->title}}">
        </div>
        <select id="select-menu" name="class_level_id" class="w-50 p-2 bg-white border border-slate-300 rounded-sm">
            <option>--Pilih kelas--</option>
    </select>
    <input id="x" type="hidden" value="{{$editMateri->body}}" name="body">
    <trix-editor input="x"></trix-editor>
    <button type="submit" class="p-2 rounded-md bg-green-500 border border-slate-300 text-white">Update Materi</button>
    <a href="/dashboard/list" class="p-[10px] rounded-md bg-yellow-500 border border-slate-300 ">Kembali</a>
</div>
</form>  
<script>
    const classLevels = {!! json_encode($classLevels) !!}
    const selectMenus = document.getElementById('select-menu')
 
    classLevels.sort((a,b) => parseInt(a. name) - parseInt(b. name))
 
    classLevels.forEach(classLevel => {
     const createOptions = document.createElement('option')
     createOptions.value = classLevel.id
     createOptions.innerText = classLevel.name
     selectMenus.appendChild(createOptions)
 
     selectMenus.value = "{{$editMateri->class_level_id}}"
    });
 </script>         
@endsection