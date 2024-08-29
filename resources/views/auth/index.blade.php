@extends('layouts.master')

@section('content')
<div class="h-[75vh]">
    <div class="grid place-items-center pt-24 my-4">
        <div class="border overflow-hidden shadow-lg rounded-md">
            <div id="progress-bar" class="bg-blue-400 hidden rounded h-2"></div>
            <div class="p-6">
                <h1 class="text-xl font-bold">Login untuk masuk ke dashboard</h1>
                @if(session('error'))
                <div class="bg-red-100 border mt-3 border-red-400 text-red-700 p-2">
                    {{ session('error') }}
                </div>
                @endif
                <form action="{{ route('/login-action') }}" method="POST" class="space-y-5 ">
                    @csrf
                <div>
                    <label class="block" for="username">Username</label>
                    <input value="{{old('username')}}" type="text" name="username" class="py-2 w-96 border-blue-400 border-b-2 focus:outline-none">
                </div>
                <div>
                    <label for="password" class="block">Password</label>
                    <input type="password" name="password" class="py-2 w-96 border-blue-400 focus:outline-none border-b-2">
                </div>
                <button type="submit" onclick="progressBar()" class="bg-blue-300 p-2 overflow-hidden rounded hover:bg-blue-400"><x-icons.login class="inline" /> Login</button>
            </form>
        </div>
        </div>
    </div>
</div>
    <script>
        const progressBar = () => {
            const bar = document.getElementById('progress-bar');
            bar.classList.remove('hidden')
            bar.classList.add('slide-in-left')
        }
    </script>
@endsection