@extends('layouts.dashboard_layouts')

@section('content')
<div class="">
    @if(session()->has('success'))
    <div
      class="font-regular fixed block w-72 max-w-screen-md rounded-lg right-5 top-5 bg-green-500 px-4 py-4 text-base text-white"
      data-dismissible="alert"
      id="alert"
    >
      <div class="absolute top-4 left-4">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          aria-hidden="true"
          class="mt-px h-6 w-6"
        >
          <path
            fill-rule="evenodd"
            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </div>
      <div class="ml-8 mr-12">
        <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
          Success
        </h5>
        <p class="mt-2 block font-sans text-base font-normal leading-relaxed text-white antialiased">
            {{ session('success') }}
        </p>
      </div>
      <div
        data-dismissible-target="alert"
        data-ripple-dark="true"
        onclick="closeAlert()"
        class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
      >
        <div role="button" class="w-max rounded-lg p-1">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            ></path>
          </svg>
        </div>
      </div>
    </div>
    
     @elseif(session()->has('error'))
    
    alert('{{ session('error') }}', 'GAGAL!'); 
    
    @endif
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
    
    const alert = document.getElementById('alert')
    if(alert)
    {
        setTimeout(() => {
            alert.style.display = 'none'
        }, 5000);
        
    }
    
    function closeAlert()
    {
        alert.style.display = 'none'
    }
</script>
@endsection
