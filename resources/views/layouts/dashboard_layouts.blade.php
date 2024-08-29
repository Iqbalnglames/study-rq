<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Study Rq | Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="path/to/jquery.js"></script>
</head>
<body class="font-poppins">
    <div class="flex">
      <div class="flex justify-end">
        <button
        id="sideButtonRight"
        class="p-2 hidden lg:block border-2 z-10 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:outline-none focus:text-white "
        >
        <x-icons.arrow-narrow-left class="w-5" />
      </button>
    </div>
      <nav id="sideBar" class="w-20 lg:w-60 z-0 drop-shadow-md bg-white text-center">
      <div class="space-y-4 mt-5">
        <h1>Study Rq</h1>
        <img class="w-10 md:w-16 rounded-full mx-auto" src="https://images.unsplash.com/photo-1628157588553-5eeea00af15c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="profile picture" />
        <h1 class="hidden lg:block" id="text"> {{Auth::user()->name}} </h1>
      </div>
        <div class="mt-8 grid grid-col text-left mx-4">
          <a
          href="/dashboard"
          class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
            <x-icons.adjustments class="inline-block" />
            <span class="hidden lg:inline" id="text">Dashboard</span>
          </a>
          <a
          href="/dashboard/list"
          class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
        >
        <x-icons.academic-cap class="inline-block" />
          <span class="hidden lg:inline" id="text">Materi</span>
        </a>
          <a
          href="/dashboard/list-tugas"
          class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
        >
        <x-icons.clipboard-check class="inline-block" />
          <span class="hidden lg:inline" id="text">Tugas</span>
        </a>
        <a
             href=""
             class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
            >
            <x-icons.clipboard-list class="inline-block" />
              <span class="hidden lg:inline" id="text">Laporan</span>
            </a>
            <a
            href=""
            class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
          >
          <x-icons.calendar class="inline-block" />
            <span class="hidden lg:inline" id="text">Kalender</span>
          </a>
          <a
          href="/logout"
          class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-red-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out"
        >
          <x-icons.logout class="inline-block" />
          <span class="hidden lg:inline" id="text">Logout</span>
        </a>
    </div>
    </nav>
    <main class="p-2 z-0 overflow-y-scroll h-screen w-[90%] overflow-x-hidden">
        @yield('content')
    </main>
</div>
  </body>
   <script>
      const buttonRight = document.getElementById('sideButtonRight')
      const navbar = document.getElementById('sideBar')
      const text = document.querySelectorAll('#text')
      buttonRight.addEventListener("click", function(){
        if(navbar.classList.contains('lg:w-60') || navbar.classList.contains('w-60')  ){
          buttonRight.classList.remove('lg:block')
          buttonRight.classList.add('hidden')
          navbar.classList.add('w-20')
          navbar.classList.remove('lg:w-60')
          navbar.classList.remove('w-60')
          for(let i = 0;i < text.length; i++){
            text[i].style.display = "none"
          }
        }
      })
      navbar.addEventListener('click', function(){
        if(navbar.classList.contains('w-20')){
          navbar.classList.remove('w-20')
          navbar.classList.add('w-60') &&
          navbar.classList.add('ease-out')
          navbar.classList.add('duration-300')
          for(let i = 0;i < text.length; i++){
            text[i].style.display = "inline"
          }
          buttonRight.classList.remove('hidden')
        }
      })
    </script>
</html>