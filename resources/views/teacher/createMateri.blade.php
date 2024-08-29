@extends('layouts.dashboard')
@section('dashboardContent')
<div class="p-4">
    @if ($message = Session::get('success'))
    <div id="notification" class="fixed block top-4 right-4 w-72 drop-shadow-lg z-20">
<div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="w-2 bg-green-400"></div>
    <div class="flex items-center px-2 py-3">
      <div class="mx-3">
        <h2 class="text-xl font-semibold text-gray-800">Success</h2>
        <p class="text-gray-600"> {{$message}} </p>
      </div>
    </div>
  </div>
    </div>
    @endif
<h1 class="text-center font-bold text-xl">Buat Materi Baru</h1>
    <form class="space-y-4" method="POST" action="{{ route('/storeMateri') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" class="block drop-shadow-md p-2 mt-2 w-3/5 rounded border border-gray-300" name="title">
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" class="block drop-shadow-md p-2 mt-2 w-3/5 rounded border border-gray-300" name="slug">
        </div>
        <div>
            <label for="category_id">Category</label>
            <select type="text" class="block p-2 mt-2 w-80 rounded border border-gray-300" name="category_id" >
                <option selected value={{$category->id}} > {{$category->name}} </option>
            </select>
        </div>
        <div>
            <label for="body">Body</label>
            <div class="mt-2">
                @include('components.forms.tinymce-editor')
            </div>
        </div>
        <button type="submit" class="p-2 bg-blue-500 hover:bg-opacity-80 rounded-md text-white">Simpan</button>
    </form>
</div>
<script>
    let notif = document.getElementById('notification');
    if(notif)
        notif.style.display = 'block'
    {
        setTimeout(() => {
            notif.style.display = 'none';
        }, 3000);
    }
</script>
@endsection