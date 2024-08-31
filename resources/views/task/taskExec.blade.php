@extends('layouts.master')

@section('content')
    <div class="m-5 p-5 bg-white rounded border border-gray-200 drop-shadow-lg">
        @if (session()->has('error'))
            <div id="alert"
                class="font-regular fixed block w-72 max-w-screen-md rounded-lg right-5 top-5 bg-red-500 px-4 py-4 text-base text-white"
                data-dismissible="alert">

                <div class="ml-8 mr-12">
                    <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
                        Gagal
                    </h5>
                    <p class="mt-2 block font-sans text-base font-normal leading-relaxed text-white antialiased">
                        @foreach ($errors->all() as $error)
                            <h1>{{ $error }}</h1>
                        @endforeach
                    </p>
                </div>
                <div data-dismissible-target="alert" data-ripple-dark="true" onclick="closeAlert()"
                    class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20">
                    <div role="button" class="w-max rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @elseif(session()->has('message'))
            <div id="alert"
                class="font-regular fixed block w-72 max-w-screen-md rounded-lg right-5 top-5 bg-green-500 px-4 py-4 text-base text-white"
                data-dismissible="alert">
                <div class="absolute top-4 left-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                        class="mt-px h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-8 mr-12">
                    <h5 class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
                        Success
                    </h5>
                    <p class="mt-2 block font-sans text-base font-normal leading-relaxed text-white antialiased">
                        {{ session('message') }}
                    </p>
                </div>
                <div data-dismissible-target="alert" data-ripple-dark="true" onclick="closeAlert()"
                    class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20">
                    <div role="button" class="w-max rounded-lg p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('kirim-tugas') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name">Nama Santri: </label>
                <input type="text" name="name" value="{{old('name')}}" class="outline-none border-b border-blue-500 focus:border-b-2"
                    placeholder="nama peserta">
            </div>
            <div class="mt-2">
                <select name="class_level_id" class="w-50 p-2 bg-white border border-slate-300 rounded-sm" >
                    <option>--Pilih kelas--</option>
                    @foreach ($classLevels as $classes)
                        <option value="{{ $classes->id }}">{{ $classes->name }}</option>
                    @endforeach
                </select>
            </div>
            <h1 class="text-center font-bold">{{ $taskExec->question_title }}</h1>
            @foreach ($taskExec->tasks as $task)
                <h1 class="{{ $task->answer_type == 'image' ? 'text-center' : '' }}">{!! $task->question !!}</h1>
                <div class="flex flex-col space-y-2 ">
                    @if ($task->answer_type == 'multiple_choices')
                        @foreach ($task->answers as $answer)
                            <div>
                                <input type="radio" name="answer"
                                    value="{{ $answer->answer }}  {{ $answer->answer == $answer->answer ? 'checked' : '' }}">
                                <label for="{{ $answer->answer }}">{{ $answer->answer }}</label>
                            </div>
                        @endforeach
                    @else
                        <div class="max-w-lg mx-auto">
                            <div id="dragDropArea"
                                class="border-2 border-dashed border-gray-300 cursor-pointer rounded-lg transition-colors duration-200 p-6 hover:bg-gray-100">
                                <p>Seret atau klik untuk mengupload gambar</p>
                                @foreach ($task->answers as $answer)
                                    <input type="hidden" value="{{ $answer->id }}" name="answer_id">
                                @endforeach
                                <input type="file" value="{{old('image')}}" id="inputImage" name="image" class="hidden" multiple>
                            </div>
                            <div>
                                <p id="fileName"></p>
                            </div>
                        </div>
                    @endif
            @endforeach
            <div class="pt-2">
                <button type="submit" class="p-2 bg-blue-600 text-white rounded mt-10 w-fit">Kirim</button>
                <a href="/penugasan" class="p-2 bg-yellow-400 rounded mt-10 w-fit">Kembali</a>
            </div>
    </div>
    </form>
    </div>
    <script>
        const dragDropArea = document.getElementById('dragDropArea')
        const inputImage = document.getElementById('inputImage')
        const fileName = document.getElementById('fileName')
        const alert = document.getElementById('alert')

        dragDropArea.addEventListener('click', function() {
            inputImage.click()
        })

        dragDropArea.addEventListener('dragover', function(event) {
            event.preventDefault()
            dragDropArea.classList.add('bg-gray-100')
        })

        dragDropArea.addEventListener('dragleave', function() {
            dragDropArea.classList.remove('bg-gray-100')
        })

        dragDropArea.addEventListener('drop', function(event) {
            event.preventDefault()
            dragDropArea.classList.remove('bg-gray-100')
            const files = event.dataTransfer.files
            handleFiles(files)
        })

        inputImage.addEventListener('change', function() {
            const files = inputImage.files
            handleFiles(files)
        })

        function handleFiles(files) {
            fileName.innerHTML = ''
            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                const listItem = document.createElement('div')
                listItem.classList.add('py-2', 'text-sm', 'text-gray-600')
                listItem.textContent = `${file.name} (${Math.round(file.size / 1024)} KB)`
                fileName.appendChild(listItem)
            }
        }

        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none'
            }, 5000);

        }

        function closeAlert() {
            alert.style.display = 'none'
        }
    </script>
@endsection
