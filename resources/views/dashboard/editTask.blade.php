@extends('layouts.dashboard_layouts')

@section('content')
    <div class="px-10 pt-2">
        <h1 class="text-2xl text-center font-bold">Buat Soal</h1>
        <form class="space-y-2" method="POST" action="{{ route('/buat-tugas') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="question_title">Judul Paket Soal</label>
                <input name="question_title" type="text" value="{{ $questionTitle->question_title }}"
                    class="border-b p-2 bg-white border rounded">
            </div>
            <div class="flex flex-col">
                <label for="material_choice">Pilih Materi</label>
                <select name="material_id" class="border-b p-2 bg-white border rounded">
                    <option>-- Pilih Materi --</option>

                </select>
            </div>
            @foreach ($questionTitle->tasks as $task)
                <div class="form-group question flex flex-col">
                    <label for="question">Pertanyaan</label>
                    <input id="x" type="hidden" name="question" value="{{ $task->question }}" />
                    <trix-editor input="x"></trix-editor>
                </div>
            @endforeach
            <div class="flex flex-col">
                <select id="answer_type" class="border-b p-2 bg-white border rounded">
                    <option>-- Pilih Tipe Jawaban --</option>
                    @foreach($answerType as $type)
                    <option>-- Pilih Tipe Jawaban --</option>
                   @endforeach
                </select>
            </div>
            <div id="answers" class="mt-4">

            </div>
            <button id="add-field" type="button"
                class="p-2 bg-green-600 rounded hidden text-white border border-gray-300 add-answer">
                Tambah Jawaban
            </button>
            <button class="p-2 bg-yellow-400 rounded border border-gray-300" type="submit">
                Simpan
            </button>
            <a href="/dashboard/list-tugas"
                class="p-[10px] rounded-md bg-red-400 text-white border border-slate-300">Kembali</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // inisialisasi variabel untuk selector element
        let formGroup = document.getElementById('answers');
        let multiple_choices = document.getElementById('answer_type')
        const checkboxes = document.getElementsByClassName("checkbox");
        const addAnswerElements = document.querySelectorAll('.add-answer');
        const checkboxArr = []
        let addButton = document.getElementById('add-field');
        let field = multiple_choices.length - 1;
        const data = {!! json_encode($questionTitle->tasks) !!}


        // template kolom jawaban untuk soal
        let template = {
            multiple_choice: function(field) {
                return `<div class="question-answer flex flex-col mb-4">
            <label for="answer_${field + 1}">Jawaban ${field + 1}</label>
            <div class="answer-input flex items-center gap-2">
<input class="border-b w-96 outline-none focus:border-blue-500 focus:border-b-2" type="text" name="answers[]" value="" class="form-control">
                <button type="button" class="p-2 bg-red-600 rounded text-white border border-gray-300 remove-button">X</button>
            </div>
            <div class="is-correct flex items-center gap-2 mt-2">
                <input  type="hidden" name="isTrue[]" value="0">
                <input class='checkbox' type="checkbox" name="isTrue[]" value="1">
                <label for="isTrue">Jawaban yang benar?</label>
            </div>
        </div>`;
            },
            upload_image: `<div class="question-answer flex flex-col mb-4">
            <label for="answer_${field + 1}">Soal untuk upload jawaban</label>
            <div class="answer-input flex items-center gap-2">
            <input class="border-b w-96 outline-none focus:border-blue-500 focus:border-b-2" type="text" name="answers[]" class="form-control">
            </div>
        </div>`
        };



        //fungsi untuk handle nilai checkbox yang tercentang dan tidak
        function handleCheckedBox() {
            checkboxesArr = Array.from(checkboxes)
            checkboxesArr.forEach(checkbox => {
                checkboxArr.push(checkbox)
                checkbox.addEventListener('change', function() {
                    const hiddenInput = checkbox.previousElementSibling
                    if (checkbox.checked) {
                        hiddenInput.remove()
                    } else {
                        if (!hiddenInput) {
                            const newHiddenInput = document.createElement('input')
                            newHiddenInput.type = 'hidden'
                            newHiddenInput.name = checkbox.name
                            newHiddenInput.value = '0'
                            checkbox.before(newHiddenInput)
                        }
                    }
                })
            })
        }

        if (data) {
            console.log(data)

            data.forEach(question => {
                question.answers.forEach((answer, i)=> {
                    formGroup.insertAdjacentHTML('beforeend', `<div class="question-answer flex flex-col mb-4">
                <label for="answer_${i + 1}">Jawaban ${i + 1}</label>
                <div class="answer-input flex items-center gap-2">
                <input class="border-b w-96 outline-none focus:border-blue-500 focus:border-b-2" type="text" name="answers[]" value="${answer.answer}" class="form-control">
                    <button type="button" class="p-2 bg-red-600 rounded text-white border border-gray-300 remove-button">X</button>
                </div>
                <div class="is-correct flex items-center gap-2 mt-2">
                    <input  type="hidden" name="isTrue[]" value="0">
                    <input class='checkbox' type="checkbox" name="isTrue[]" ${answer.isTrue == '1' ? 'checked' : null} value="1">
                    <label for="isTrue">Jawaban yang benar?</label>
                </div>
            </div>`)
                })
            })
            handleCheckedBox()
            addAnswerElements.forEach(element => {
                console.log(data)
                element.classList.remove('hidden');
            });
        }

        // event untuk handle perubahan jenis jawaban
        multiple_choices.addEventListener('change', function() {
            if (multiple_choices.value === 'multiple_choice') {

                while (formGroup.firstChild) {
                    formGroup.removeChild(formGroup.firstChild);
                }

                if (field >= 0) {
                    field = -1
                }

                field++

                formGroup.insertAdjacentHTML('beforeend', template.multiple_choice(field))
                handleCheckedBox()
                addAnswerElements.forEach(element => {
                    console.log(data)
                    element.classList.remove('hidden');
                });

            } else if (multiple_choices.value === 'image') {
                addAnswerElements.forEach(element => element.classList.remove('hidden'))

                while (formGroup.firstChild) {
                    formGroup.removeChild(formGroup.firstChild);
                }

                formGroup.insertAdjacentHTML('beforeend', template.upload_image)

            } else {
                while (formGroup.firstChild) {
                    formGroup.removeChild(formGroup.firstChild);
                }

                field = -1

                addAnswerElements.forEach(element => element.classList.add('hidden'))

            }
        })

        // event yang terjadi ketika addButton diklik
        addButton.addEventListener('click', function() {
            field++;
            if (field < 0) {
                return field = 0
            }
            formGroup.insertAdjacentHTML('beforeend', template.multiple_choice(field));
            handleCheckedBox()
        });

        document.getElementById('answers').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-button')) {
                event.target.closest('.question-answer').remove();
                field--;
            }
        });
    </script>
@endsection
