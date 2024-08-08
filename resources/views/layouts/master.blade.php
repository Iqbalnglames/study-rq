<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Study Rq</title>
</head>
<body>
    <div>
        <header class="bg-blue-200 flex justify-between px-4 h-16 items-center">
            <a href="/" class="text-2xl font-bold">Study Rq</a>
            <input type="text" class="p-1 border rounded-lg px-4 lg:w-72 w-40 bg-opacity-50 bg-white" placeholder="Search is not available yet" disabled />
            @if(Auth::check())
                <button onclick="toggleMiniBar()" class="flex p-3 border-2 rounded border-black hover:bg-blue-300">
                    <div>
                        <div class="w-4 ml-1 rounded-full block bg-black h-4"></div>
                        <div class="w-6 rounded-t-full bg-black h-2"></div>
                    </div>
                    <p class="ml-2 lg:block hidden">{{ Auth::user()->name }}</p>
                </button>
                <div id="miniBar" class="flex-col fixed hidden right-4 top-[60px] lg:w-[292px] w-auto z-40 bg-slate-200 border border-slate-400 drop-shadow-md rounded">
                    <div class="mx-2 py-5 lg:hidden">
                        <div>
                            <div class="w-4 ml-1 rounded-full block bg-black h-4"></div>
                            <div class="w-6 rounded-t-full bg-black h-2"></div>
                        </div>
                        <p class=" inline">{{ Auth::user()->name }}</p>
                    </div>
                    <a href="/dashboard" class="p-2 hover:bg-slate-400 border border-slate-400 ">Pergi ke dashboard</a>
                    <a href="/logout" class="border border-slate-400  p-2 hover:bg-slate-400">Logout</a>
                </div>
            @else
                <a href="/login" class="flex p-3 border-2 rounded border-black hover:bg-blue-300">
                    <x-icons.login class="w-6 h-6" />
                    <p class="ml-2 lg:block hidden">Login sebagai guru</p>
                </a>
            @endif
        </header>
        <main>
            @yield('content')
        </main>
    </div>
    <footer class="h-40 place-content-center text-center bg-blue-700 text-white">
        <h1>Made with 💗 by Muhammad Iqbal Tsabitul Azmi</h1>
        <h1>Version 1.0.12 <a class="hover:underline" href="/changelog">see the changelog</a></h1>
    </footer>
    <script>
        const miniBar = document.getElementById('miniBar');
        const toggleMiniBar = () => {
            if (miniBar.classList.contains('hidden')) {
                miniBar.classList.remove('hidden');
                miniBar.classList.add('flex');
            } else {
                miniBar.classList.remove('flex');
                miniBar.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
