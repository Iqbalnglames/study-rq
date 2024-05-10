@extends('layouts.dashboard_layouts')

@section('content')
<div class="">
    <h1 class="font-semibold text-2xl mb-5 text-center">List Materi yang sudah diposting</h1>
    <a href="/dashboard/buat-materi" class="p-2 bg-green-600 rounded text-white border border-gray-300">+ Buat Materi</a>     
    <a href="/kelas" class="p-2 bg-blue-600 rounded text-white border border-gray-300">Menuju ke daftar kelas</a>     
    <table class=" border border-gray-300 rounded-md mt-4 w-full overflow-y-scroll">
        <tr class="font-bold">
            <th class="border bg-slate-100 border-gray-300">Judul</th>
            <th class="border bg-slate-100 border-gray-300">Kelas</th>
            <th class="border bg-slate-100 border-gray-300">Aksi</th>
        </tr>
        @foreach($materials as $material)
        <tr class="">
            <td class="border p-3 border-gray-300"><h1>{{ $material->title }}</h1></td>    
            <td class="border p-3 border-gray-300"><h1>{{ $material->classLevel->name }}</h1></td>    
            <td class="border p-3 uppercase text-center border-gray-300">
                <a href="edit-materi/{{$material->id}}/{{$material->slug}}" class="bg-blue-500 p-2 rounded text-white">edit</a> 
                <a href="#" onclick="openModal('{{ $material->title }}', {{$material->id}} )" class="bg-red-500 p-2 rounded text-white">delete</a></td>
        </tr>    
        <div id="modal" class="fixed hidden left-[40%] top-1/3 h-40 justify-center">
            <div class="bg-white drop-shadow-md rounded-md p-5">
                <div class="mb-6 text-center">
                    <h1>Yakin untuk Menghapus materi ini</h1>
                    <h1></h1>
                </div>
                <div class="text-center">
                    <a class="p-3 bg-red-500 text-white rounded">Hapus</a>
                    <a href="" onclick="closeModal()" class="p-3 bg-yellow-400 rounded">Batal</a>
                </div>
            </div>
        </div>
        @endforeach
    </table>
</div>
<script>
    let modal = document.getElementById('modal')
    function openModal(materialTitle, materialId)
    {
        modal.querySelector('h1:nth-child(2)').textContent = materialTitle
        modal.style.display ='block'
        modal.querySelector('a:nth-child(1)').href =  `material/${materialId}/delete`
    }
    
    function closeModal()
    {
        modal.style.display ='none'

    }

    @if(session()->has('success'))

    alert("{{ session('success') }}");

@elseif(session()->has('error'))

alert('{{ session('error') }}', 'GAGAL!'); 

@endif
    
</script>
@endsection