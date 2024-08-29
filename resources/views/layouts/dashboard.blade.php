@extends('layouts.master')

@section('header')
@include('components.head.tinymce-config')
@endsection

@section('content')
<div class="flex fixed drop-shadow-md left-0 z-0">
    <!-- aside -->
    <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-blue-900 text-white p-2" style="height: 90.5vh">
        <a href="/dashboard" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
            <span class="text-2xl"><i class="bx bx-home"></i></span>
            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm9 4a1 1 0 10-2 0v6a1 1 0 102 0V7zm-3 2a1 1 0 10-2 0v4a1 1 0 102 0V9zm-3 3a1 1 0 10-2 0v1a1 1 0 102 0v-1z" clip-rule="evenodd"></path>
            </svg> Dashboard</span>
        </a>

        <a href="/dashboard/list-post" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
            <span class="text-2xl"><i class="bx bx-cart"></i></span>
            <span><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
            </svg> List Postingan</span>
        </a>

        <button onclick=dropDown() class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
            <span class="text-2xl"><i class="bx bx-shopping-bag"></i></span>
            <span> <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"></path>
            </svg> Buat baru</span>
        </button>
        {{-- dropdown menu --}}
        <div id="menuDown" class="hidden bg-blue-950 rounded-md">
            <a href="/dashboard/create-materi" class="flex items-center space-x-1 rounded-md pl-6 pr-2 py-3 hover:bg-gray-100 hover:text-blue-600"> <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
            </svg> Materi</a>
            <a href="" class="flex items-center space-x-1 rounded-md pl-6 pr-2 py-3 hover:bg-gray-100 hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path>
                    <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path>
                </svg> Artikel</a>
        </div>
        {{-- end dropdown --}}
        <a href="#" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
            <span class="text-2xl"><i class="bx bx-heart"></i></span>
            <span> <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg> Account Profile</span>
        </a>

        <a href="{{ route('/logout') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-gray-100 hover:text-blue-600">
            <span class="text-2xl"><i class="bx bx-user"></i></span>
            <span> <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 inline" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg> Logout</span>
        </a>
    </aside>
</div>
<div class="ml-72">
    @yield('dashboardContent')
</div>
    <script>
         function dropDown() {
        let menuDown = document.getElementById('menuDown')
        if (menuDown.style.display == 'grid') {
            menuDown.style.display = 'none';
        } else {
            menuDown.style.display = 'grid'
        }
    }
    </script>
@endsection