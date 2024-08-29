<!-- Login Form -->
<div id="toggleForm" class="bg-gray-400 h-screen hidden fixed right-0 left-0 z-10 bg-opacity-80">
    <div class="bg-white w-[30%] place-self-center shadow-md rounded px-8  pt-6 pb-8 mb-4 flex flex-col">
        <a onclick="toggleForm()"
            class="hover:bg-gray-200 bg-white rounded-lg py-2 px-4 text-lg font-bold border-2 place-self-end border-gray-300 select-none">X</a>
        <h1 class="font-bold text-lg text-center">Login As Teacher</h1>
        <div class="mb-4">
            <form action={{ route('/login') }} method="post">
                @csrf
                @if(session('error'))
                    <script>
                        window.onload = function() {
                            document.getElementById('toggleForm').style.display = 'grid';
                        }
                    </script>
                <div id="alert" class="text-center p-2 bg-red-200 text-red-600">
                    {{ session('error') }}                    
                </div>
                    @endif
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username"
                type="text" placeholder="Username" required >
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input name="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
            id="password" type="password" required placeholder="******************">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-opacity-90 text-white font-bold py-2 px-4 rounded" type="submit">
                Sign In
            </button>
        </form>
            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                Forgot Password?
            </a>
        </div>
    </div>
</div>
<!-- end Login Form -->

<!-- component -->
<nav class="bg-white z-10 fixed right-0 left-0 flex justify-between shadow-lg items-center px-8 h-20">
    <!-- logo -->
    <div class="inline-flex">
        <a class="_o6689fn" href="/">
            <div class="hidden font-bold md:block">
                <h1>StudyRq</h1>
            </div>
            <div class="block font-bold md:hidden">
                <h1>StudyRq</h1>
            </div>
        </a>
    </div>
    <!-- end logo -->

    <!-- search bar -->
    <div class="hidden sm:block flex-shrink flex-grow-0 justify-start px-2">
        <div class="inline-block">
            <div class="inline-flex items-center max-w-full">
                <button id="toggleSearchButton"
                    class="flex items-center hover:bg-slate-100 flex-grow-0 flex-shrink pl-2 relative w-60 border rounded-full px-1  py-1"
                    type="button">
                    <div class="block flex-grow flex-shrink overflow-hidden">Search Here</div>
                    <div class="flex items-center justify-center relative h-8 w-8 rounded-full">
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            role="presentation" focusable="false" style="
                                display: block;
                                fill: none;
                                height: 12px;
                                width: 12px;
                                stroke: currentcolor;
                                stroke-width: 5.33333;
                                overflow: visible;
                            ">
                            <g fill="none">
                                <path
                                    d="m13 24c6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11 0 6.0751322 4.92486775 11 11 11zm8-3 9 9">
                                </path>
                            </g>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <!-- end search bar -->

    @if(!Auth::user())
    <!-- login -->
    <div class="flex-initial">
        <div class="flex justify-end items-center relative">
            <div class="flex mr-4 items-center">
                <a class="inline-block mr-2 py-2 px-3 border hover:bg-gray-200 rounded-full" onclick=toggleForm()>
                    <div class="flex items-center relative cursor-pointer whitespace-nowrap">Login As Teacher</div>
                </a>             
                @else
            <div class="block">
                <div class="inline relative">
                    <button type="button" 
                    onclick="toggleMenuDash()"
                        class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                        <div class="pl-1">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                role="presentation" focusable="false"
                                style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 3; overflow: visible;">
                                <g fill="none" fill-rule="nonzero">
                                    <path d="m2 16h28"></path>
                                    <path d="m2 24h28"></path>
                                    <path d="m2 8h28"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="block flex-grow-0 flex-shrink-0 h-10 w-12 pl-5">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                role="presentation" focusable="false"
                                style="display: block; height: 100%; width: 100%; fill: currentcolor;">
                                <path
                                    d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z">
                                </path>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="menuDash" class="hidden border fixed rounded-md right-6 drop-shadow-lg bg-white top-16 ">
        <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100 hover:text-blue-400">Pergi ke Dashboard</a>
        <a href="{{ route('/logout') }}" class="block px-4 py-2 hover:bg-gray-100 hover:text-blue-400">Logout</a>
    </div>
    <!-- end login -->
    @endif
</nav>

<!-- Search Form -->
<div id="toggleSearch" class="fixed hidden bg-opacity-90 top-0 left-0 w-full h-full bg-gray-200 z-40 select-none">
    <div class="w-4/6 z-50 relative mx-auto mt-36">
        <div class="bg-white w-full h-16 rounded-xl mb-3 shadow-lg p-2">
            <input type="text" placeholder="Search Material or Blog"
                class="w-full h-full text-2xl rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
        </div>
        <div class="bg-white w-full rounded-xl shadow-xl overflow-hidden p-1">
            <!-- items -->
            <div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
                <div class="mr-4">
                    <div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl">
                        <svg t="1645067416159" class="icon" viewBox="0 0 1024 1024" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" p-id="1487" width="200" height="200">
                            <path
                                d="M57.6 829.866667C17.066667 804.266667 6.4 750.933333 32 710.4L192 814.933333c-25.6 40.533333-78.933333 51.2-119.466667 25.6l-14.933333-10.666666z"
                                fill="#FF8A14" p-id="1488"></path>
                            <path
                                d="M1006.933333 757.333333c0 46.933333-38.4 87.466667-87.466666 87.466667v-189.866667c46.933333 0 87.466667 38.4 87.466666 87.466667v14.933333z"
                                fill="#FF8A14" p-id="1489"></path>
                            <path
                                d="M704 358.4h-189.866667l10.666667-42.666667c4.266667-14.933333 17.066667-25.6 34.133333-25.6H661.333333c14.933333 0 29.866667 10.666667 34.133334 25.6l8.533333 42.666667z"
                                fill="#ADC4D9" p-id="1490"></path>
                            <path
                                d="M919.466667 885.333333c0 38.4-32 68.266667-68.266667 68.266667H366.933333c-38.4 0-68.266667-32-68.266666-68.266667V652.8C298.666667 480 437.333333 341.333333 608 341.333333s311.466667 138.666667 311.466667 311.466667v232.533333z"
                                fill="#FFE500" p-id="1491"></path>
                            <path
                                d="M608 341.333333c-170.666667 0-309.333333 138.666667-309.333333 311.466667v87.466667c0-172.8 138.666667-311.466667 311.466666-311.466667s311.466667 138.666667 311.466667 311.466667v-87.466667C919.466667 480 780.8 341.333333 608 341.333333z"
                                fill="#FFF48C" p-id="1492"></path>
                            <path d="M256 979.2a352 32 0 1 0 704 0 352 32 0 1 0-704 0Z" fill="#45413C" p-id="1493">
                            </path>
                            <path
                                d="M834.133333 947.2c0 19.2-14.933333 34.133333-34.133333 34.133333H418.133333c-19.2 0-34.133333-14.933333-34.133333-34.133333v-104.533333c0-19.2 14.933333-34.133333 34.133333-34.133334h379.733334c19.2 0 34.133333 14.933333 34.133333 34.133334v104.533333z"
                                fill="#C0DCEB" p-id="1494"></path>
                            <path
                                d="M834.133333 842.666667c0-19.2-14.933333-34.133333-34.133333-34.133334H418.133333c-19.2 0-34.133333 14.933333-34.133333 34.133334v42.666666c0-19.2 14.933333-34.133333 34.133333-34.133333h379.733334c19.2 0 34.133333 14.933333 34.133333 34.133333v-42.666666z"
                                fill="#DAEDF7" p-id="1495"></path>
                            <path d="M755.2 618.666667m-96 0a96 96 0 1 0 192 0 96 96 0 1 0-192 0Z" fill="#FFFFFF"
                                p-id="1496"></path>
                            <path
                                d="M755.2 618.666667m-34.133333 0a34.133333 34.133333 0 1 0 68.266666 0 34.133333 34.133333 0 1 0-68.266666 0Z"
                                fill="#FF6242" p-id="1497"></path>
                            <path
                                d="M462.933333 618.666667m-87.466666 0a87.466667 87.466667 0 1 0 174.933333 0 87.466667 87.466667 0 1 0-174.933333 0Z"
                                fill="#FFFFFF" p-id="1498"></path>
                            <path
                                d="M462.933333 618.666667m-34.133333 0a34.133333 34.133333 0 1 0 68.266667 0 34.133333 34.133333 0 1 0-68.266667 0Z"
                                fill="#6DD627" p-id="1499"></path>
                            <path
                                d="M426.666667 842.666667m-8.533334 0a8.533333 8.533333 0 1 0 17.066667 0 8.533333 8.533333 0 1 0-17.066667 0Z"
                                fill="#C0DCEB" p-id="1500"></path>
                            <path
                                d="M426.666667 834.133333c-4.266667 0-8.533333 4.266667-8.533334 8.533334s4.266667 8.533333 8.533334 8.533333 8.533333-4.266667 8.533333-8.533333-2.133333-8.533333-8.533333-8.533334z"
                                fill="#45413C" p-id="1501"></path>
                            <path
                                d="M791.466667 842.666667m-8.533334 0a8.533333 8.533333 0 1 0 17.066667 0 8.533333 8.533333 0 1 0-17.066667 0Z"
                                fill="#C0DCEB" p-id="1502"></path>
                            <path
                                d="M791.466667 834.133333c-4.266667 0-8.533333 4.266667-8.533334 8.533334s4.266667 8.533333 8.533334 8.533333 8.533333-4.266667 8.533333-8.533333-4.266667-8.533333-8.533333-8.533334z"
                                fill="#45413C" p-id="1503"></path>
                            <path
                                d="M800 55.466667m-42.666667 0a42.666667 42.666667 0 1 0 85.333334 0 42.666667 42.666667 0 1 0-85.333334 0Z"
                                fill="#FF6242" p-id="1504"></path>
                            <path
                                d="M919.466667 652.8v42.666667c42.666667 0 78.933333 32 85.333333 72.533333 0-4.266667 2.133333-8.533333 2.133333-12.8v-17.066667c0-46.933333-38.4-85.333333-87.466666-85.333333z"
                                fill="#FFAA54" p-id="1505"></path>
                            <path
                                d="M29.866667 714.666667c0 32 17.066667 64 49.066666 85.333333l17.066667 10.666667c29.866667 19.2 64 21.333333 91.733333 12.8l6.4-6.4-160-104.533334c-4.266667 0-4.266667 0-4.266666 2.133334z"
                                fill="#FFAA54" p-id="1506"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-bold text-lg">Name: Tom</div>
                    <div class="text-xs text-gray-500">
                        <span class="mr-2">No: 007886</span>
                        <span class="mr-2">gender: man</span>
                        <span class="mr-2">hobby: skiing</span>
                    </div>
                </div>
            </div>
            <!-- items -->
            <div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
                <div class="mr-4">
                    <div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl">
                        <svg t="1645067490174" class="icon" viewBox="0 0 1024 1024" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" p-id="1640" width="200" height="200">
                            <path d="M96 970.666667a416 32 0 1 0 832 0 416 32 0 1 0-832 0Z" fill="#45413C" p-id="1641">
                            </path>
                            <path
                                d="M896 864c0 46.933333-38.4 85.333333-85.333333 85.333333H213.333333c-46.933333 0-85.333333-38.4-85.333333-85.333333V576c0-211.2 172.8-384 384-384s384 172.8 384 384v288z"
                                fill="#DAEDF7" p-id="1642"></path>
                            <path
                                d="M512 192C300.8 192 128 364.8 128 576v106.666667c0-211.2 172.8-384 384-384s384 172.8 384 384v-106.666667c0-211.2-172.8-384-384-384z"
                                fill="#FFFFFF" p-id="1643"></path>
                            <path
                                d="M650.666667 938.666667c0 23.466667-19.2 42.666667-42.666667 42.666666h-192c-23.466667 0-42.666667-19.2-42.666667-42.666666v-170.666667c0-23.466667 19.2-42.666667 42.666667-42.666667h192c23.466667 0 42.666667 19.2 42.666667 42.666667v170.666667z"
                                fill="#C0DCEB" p-id="1644"></path>
                            <path d="M373.333333 821.333333h277.333334v42.666667h-277.333334z" fill="#ADC4D9"
                                p-id="1645"></path>
                            <path
                                d="M970.666667 778.666667l-74.666667 42.666666V554.666667l74.666667 42.666666zM53.333333 778.666667l74.666667 42.666666V554.666667l-74.666667 42.666666z"
                                fill="#ADC4D9" p-id="1646"></path>
                            <path
                                d="M768 74.666667m-53.333333 0a53.333333 53.333333 0 1 0 106.666666 0 53.333333 53.333333 0 1 0-106.666666 0Z"
                                fill="#FF6242" p-id="1647"></path>
                            <path
                                d="M650.666667 821.333333h-277.333334V768c0-23.466667 19.2-42.666667 42.666667-42.666667h192c23.466667 0 42.666667 19.2 42.666667 42.666667v53.333333z"
                                fill="#FF6242" p-id="1648"></path>
                            <path
                                d="M693.333333 533.333333m-106.666666 0a106.666667 106.666667 0 1 0 213.333333 0 106.666667 106.666667 0 1 0-213.333333 0Z"
                                fill="#00DFEB" p-id="1649"></path>
                            <path
                                d="M693.333333 533.333333m-42.666666 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z"
                                fill="#627B8C" p-id="1650"></path>
                            <path
                                d="M330.666667 533.333333m-106.666667 0a106.666667 106.666667 0 1 0 213.333333 0 106.666667 106.666667 0 1 0-213.333333 0Z"
                                fill="#00DFEB" p-id="1651"></path>
                            <path
                                d="M330.666667 533.333333m-42.666667 0a42.666667 42.666667 0 1 0 85.333333 0 42.666667 42.666667 0 1 0-85.333333 0Z"
                                fill="#627B8C" p-id="1652"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-bold text-lg">Name: Tom</div>
                    <div class="text-xs text-gray-500">
                        <span class="mr-2">No: 007886</span>
                        <span class="mr-2">gender: man</span>
                        <span class="mr-2">hobby: skiing</span>
                    </div>
                </div>
            </div>
            <!-- items -->
            <div class="w-full flex p-3 pl-4 items-center hover:bg-gray-300 rounded-lg cursor-pointer">
                <div class="mr-4">
                    <div class="h-9 w-9 rounded-sm flex items-center justify-center text-3xl">
                        <svg t="1645067516798" class="icon" viewBox="0 0 1024 1024" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" p-id="1786" width="200" height="200">
                            <path
                                d="M347.733333 977.066667a249.6 34.133333 0 1 0 499.2 0 249.6 34.133333 0 1 0-499.2 0Z"
                                fill="#45413C" p-id="1787"></path>
                            <path d="M597.333333 586.666667m-288 0a288 288 0 1 0 576 0 288 288 0 1 0-576 0Z"
                                fill="#FFE500" p-id="1788"></path>
                            <path
                                d="M597.333333 298.666667c-157.866667 0-288 128-288 288S437.333333 874.666667 597.333333 874.666667c157.866667 0 288-128 288-288S757.333333 298.666667 597.333333 298.666667z m0 531.2c-145.066667 0-262.4-117.333333-262.4-262.4 0-145.066667 117.333333-262.4 262.4-262.4 145.066667 0 262.4 117.333333 262.4 262.4 0 145.066667-117.333333 262.4-262.4 262.4z"
                                fill="#EBCB00" p-id="1789"></path>
                            <path
                                d="M597.333333 725.333333m-115.2 0a115.2 115.2 0 1 0 230.4 0 115.2 115.2 0 1 0-230.4 0Z"
                                fill="#FFB0CA" p-id="1790"></path>
                            <path
                                d="M597.333333 733.866667c-40.533333 0-76.8 21.333333-98.133333 53.333333 21.333333 32 55.466667 53.333333 98.133333 53.333333s76.8-21.333333 98.133334-53.333333c-21.333333-32-55.466667-53.333333-98.133334-53.333333z"
                                fill="#FF866E" p-id="1791"></path>
                            <path
                                d="M631.466667 379.733333l-125.866667-23.466666c-8.533333-2.133333-14.933333-6.4-14.933333-14.933334-2.133333-8.533333 2.133333-14.933333 8.533333-21.333333l115.2-85.333333-81.066667-14.933334c-10.666667-2.133333-17.066667-12.8-14.933333-23.466666 2.133333-10.666667 12.8-17.066667 23.466667-14.933334l125.866666 23.466667c8.533333 2.133333 14.933333 6.4 14.933334 14.933333 2.133333 8.533333-2.133333 14.933333-8.533334 21.333334l-115.2 85.333333 81.066667 14.933333c10.666667 2.133333 17.066667 12.8 14.933333 23.466667-2.133333 10.666667-12.8 17.066667-23.466666 14.933333zM401.066667 507.733333L298.666667 548.266667c-6.4 2.133333-12.8 2.133333-19.2-4.266667-4.266667-4.266667-6.4-12.8-4.266667-19.2l44.8-115.2-66.133333 27.733333c-8.533333 4.266667-19.2 0-21.333334-8.533333-4.266667-8.533333 0-19.2 8.533334-21.333333l102.4-40.533334c6.4-2.133333 12.8-2.133333 19.2 4.266667 4.266667 4.266667 6.4 12.8 4.266666 19.2l-44.8 115.2 66.133334-27.733333c8.533333-4.266667 19.2 0 21.333333 8.533333 4.266667 8.533333 0 17.066667-8.533333 21.333333zM460.8 305.066667l-241.066667 46.933333c-12.8 2.133333-25.6-2.133333-32-12.8-6.4-10.666667-6.4-23.466667 0-34.133333L341.333333 89.6 174.933333 121.6c-17.066667 4.266667-32-8.533333-36.266666-23.466667-2.133333-17.066667 8.533333-34.133333 25.6-36.266666L405.333333 14.933333c12.8-2.133333 25.6 2.133333 32 12.8 6.4 10.666667 6.4 23.466667 0 34.133334L283.733333 277.333333l166.4-32c17.066667-4.266667 32 8.533333 36.266667 23.466667 2.133333 17.066667-8.533333 34.133333-25.6 36.266667z"
                                fill="#DABFF5" p-id="1792"></path>
                            <path
                                d="M174.933333 93.866667l241.066667-46.933334c8.533333-2.133333 17.066667 0 23.466667 4.266667 2.133333-8.533333 2.133333-17.066667-4.266667-25.6-6.4-10.666667-19.2-14.933333-32-12.8L164.266667 61.866667c-17.066667 2.133333-27.733333 19.2-25.6 36.266666 2.133333 8.533333 6.4 14.933333 12.8 19.2 4.266667-10.666667 12.8-21.333333 23.466666-23.466666z"
                                fill="#EDDBFF" p-id="1793"></path>
                            <path
                                d="M755.2 672a36.266667 21.333333 0 1 0 72.533333 0 36.266667 21.333333 0 1 0-72.533333 0Z"
                                fill="#FFAA54" p-id="1794"></path>
                            <path
                                d="M369.066667 672a36.266667 21.333333 0 1 0 72.533333 0 36.266667 21.333333 0 1 0-72.533333 0Z"
                                fill="#FFAA54" p-id="1795"></path>
                            <path
                                d="M633.6 842.666667c0-14.933333 8.533333-27.733333 21.333333-34.133334 4.266667-2.133333 10.666667-6.4 12.8-10.666666l12.8-14.933334c2.133333-4.266667 6.4-6.4 10.666667-6.4 8.533333 0 14.933333 6.4 14.933333 14.933334V832c0 14.933333-10.666667 25.6-25.6 25.6h-10.666666v115.2c0 10.666667-8.533333 17.066667-17.066667 17.066667s-17.066667-8.533333-17.066667-17.066667v-130.133333z"
                                fill="#4AEFF7" p-id="1796"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-bold text-lg">Name: Tom</div>
                    <div class="text-xs text-gray-500">
                        <span class="mr-2">No: 007886</span>
                        <span class="mr-2">gender: man</span>
                        <span class="mr-2">hobby: skiing</span>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="mt-4 font-bold text-xl">press Esc to close search bar</h1>
    </div>
</div>

<script>
    function toggleForm() {
        let x = document.getElementById('toggleForm')
        if (x.style.display == 'grid') {
            x.style.display = 'none';
        } else {
            x.style.display = 'grid'
        }
    }

    const searchButton = document.getElementById('toggleSearchButton');
    let search = document.getElementById('toggleSearch')
    searchButton.addEventListener('click', function () {
        let search = document.getElementById('toggleSearch')
        if (search.style.display = 'none') {
            search.style.display = 'block';
        }
    })
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape") {
            if (search) {
                search.style.display = 'none';
            }
        }
    });

    function toggleMenuDash() {
        let x = document.getElementById('menuDash')
        if (x.style.display == 'block') {
            x.style.display = 'none';
        } else {
            x.style.display = 'block'
        }
    }

</script>