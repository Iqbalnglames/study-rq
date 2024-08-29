@extends('layouts.dashboard')

@section('dashboardContent')
    <!-- component -->
<div class="px-10 pt-2">
    <h1 class="text-2xl text-center font-bold">List Postingan yang Tersedia</h1>
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
<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Title</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Slug</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Category</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Title</span>
                {{ $post->title }}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Slug</span>
                {{ $post->slug }}
            </td>
          	<td class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Category</span>
                @if($post->category->name === 'materi Pembelajaran')
                <span class="rounded bg-green-200 text-green-800 py-1 px-3 text-xs font-bold"> {{ $post->category->name }} </span>
                @else
                <span class="rounded bg-red-200 text-red-800 py-1 px-3 text-xs font-bold"> {{ $post->category->name }} </span>
                @endif
          	</td>
            <td class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                <a href="/dashboard/{{ $post->slug }}/edit-post" class="text-white bg-blue-600 hover:bg-opacity-80 p-2 border rounded-md">Edit</a>
                <a href="#" class="text-white bg-red-600 hover:bg-opacity-80 p-2 border rounded-md">Remove</a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
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