<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Study Rq |  </title>
</head>
<body>
   <div>
    <header class="bg-blue-200 flex justify-between px-4 h-16 items-center">
        <a href="/" class="text-2xl font-bold">Study Rq</a>
        <input type="text" class="p-1 border rounded-lg px-4 w-72 bg-opacity-50 bg-white" placeholder="Search engine is not available yet" disabled />
        <a href="/dashboard" class="flex p-3 border-2 rounded-full border-black hover:bg-blue-300">
            <div>
                <div class="w-4 ml-1 rounded-full block bg-black h-4">
                </div>
                <div class="w-6 rounded-t-full bg-black h-2">
                </div>
            </div>
            <p class="ml-2">Login sebagai guru</p>
        </a>
    </header>
    @yield('content')
   </div>
   <footer class="h-40 place-content-center text-center bg-blue-700 text-white">
    <h1>Made with 💗 by Muhammad Iqbal Tsabitul Azmi</h1>
    <h1>Version 1.0.12 <a class="hover:underline" href="/changelog">see the changelog</a></h1>
   </footer>
</body>
</html>