@extends('layouts.dashboard')
@section('dashboardContent')
<div class="p-4">
<h1 class="text-center font-bold text-xl">Edit Postingan</h1>
    <form class="space-y-4" method="POST" action="{{ route('/update-post', ['post' => $post->slug]) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" value="{{ $post->title }}" class="block drop-shadow-md p-2 mt-2 w-3/5 rounded border border-gray-300" name="title">
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" value="{{ $post->slug }}" class="block p-2 mt-2 w-3/5 drop-shadow-md rounded border border-gray-300" name="slug">
        </div>
        <div>
            <label for="category_id">Category</label>
            <select type="text" class="block p-2 mt-2 w-80 rounded border border-gray-300 drop-shadow-md" name="category_id" >
                <option selected value={{$post->category->id}} > {{$post->category->name}} </option>
                @foreach($category as $category)
                @if($category->name !== $post->category->name)
                <option value={{$category->id}} > {{$category->name}} </option>
                @endif
                @endforeach
            </select>
        </div>
        <div>
            <label for="body">Body</label>
            <div class="mt-2">
                <div>
                    <textarea id="myeditorinstance" name="body" placeholder="Mulai tulis disini" >
                        {{ $post->body }}
                    </textarea>
            </div>
            </div>
        </div>
        <button type="submit" class="p-2 bg-blue-500 hover:bg-opacity-80 rounded-md text-white">Simpan Perubahan</button>
        <a href="/dashboard/list-post" class="p-2 bg-yellow-500 hover:bg-opacity-80 rounded-md ">Kembali</a>
    </form>
</div>
@endsection