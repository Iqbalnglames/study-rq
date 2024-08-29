<?php

namespace App\Http\Controllers;

use App\Enums\AnswerType;
use App\Models\Task;
use App\Models\Answer;
use App\Models\AnsweredQuestion;
use App\Models\AnswerImage;
use App\Models\Attendance;
use App\Models\ClassLevel;
use App\Models\Material;
use App\Models\QuestionTitle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {
        $materials = Material::all();

        return view('task.index', compact('materials'));
    }

    public function tasksListSantri($slug)
    {
        $materialTarget = Material::where('slug', $slug)->first();
        $tasks = Material::where('slug', $slug)->first()->questionTitle()->get();

        return view('task.tasksList', compact('tasks', 'materialTarget'));
    }

    public function taskList()
    {
        $taskTitle = QuestionTitle::with('tasks')->get();

        return view('dashboard.taskList', compact('taskTitle'));
    }

    public function newTask(Request $request)
    {
        $materials = Material::all();
        $answerType = AnswerType::cases();
        return view('dashboard.createTask', compact('materials', 'answerType'));
    }

    public function createTask(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question_title' => 'required',
            'question' => 'required',
            'answers.*' => 'required',
            'answer_type' => ['required', 'in:' . implode(',', array_column(AnswerType::cases(), 'value'))]
        ]);

        if ($validate->fails()) {
            return redirect('dashboard/buat-tugas')->withInput()->with('error', 'periksa lagi kolom yang belum di isi');
        }

        $questionTitle = QuestionTitle::create([
            'material_id' => $request->material_id,
            'question_title' => $request->question_title,
            'slug' => Str::slug($request->question_title),
        ]);

        $task = Task::create([
            'question_title_id' => $questionTitle->id,
            'question' => $request->question,
            'slug' => Str::slug($request->question),
            'answer_type' => $request->answer_type,
        ]);

        foreach ($request->answers as $index => $answer) {
            Answer::create([
                'task_id' => $task->id,
                'answer' => $answer,
                'isTrue' => $request->isTrue[$index] ?? 0,
            ]);
        }

        return redirect('dashboard/buat-tugas')->with('success', 'berhasil menyimpan soal');
    }

    public function editTask($slug)
    {
        $questionTitle = QuestionTitle::where('slug', $slug)->with('tasks.answers')->first();
        $answerType = AnswerType::cases();
        $materials = Material::all();

        return view('dashboard.editTask', compact('questionTitle', 'materials', 'answerType'));
    }

    public function executionTask($material, $questionTitle)
    {
        $taskExec = QuestionTitle::with('tasks.answers')->where('slug', $questionTitle)->whereHas('material', function ($query) use ($material) {
            $query->where('slug', $material);
        })->first();
        $classLevels = ClassLevel::all();

        return view('task.TaskExec', compact('taskExec', 'classLevels'));
    }

    public function answeredTask(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'class_level_id' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->with(['error' => 'kolom tidak boleh kosong']);
        }

        $image = $request->file('image');

        if ($image) {
            $image->storeAs('public/answers', $image->hashName());
        }

        $answeredImages = AnswerImage::create([
            'image' => $image->hashName()
        ]);

        $attendance = Attendance::create([
            'name' => $request->name,
            'class_level_id' => $request->class_level_id,
        ]);


        AnsweredQuestion::create([
            'attendance_id' => $attendance->id,
            'answer_id' => $request->answer_id,
            'answer_image_id' => $answeredImages->id,
        ]);

        return redirect()->back()->with('message', 'tugas telah terkirim');
    }

    public function showAnswer()
    {
        $questionTitle = QuestionTitle::all();
        return view('dashboard.responden', compact('questionTitle'));
    }

    public function showAttendance($slug)
    {
        $attendances = Attendance::with('answers.task.questionTitle', 'images')->whereHas('answers.task.questionTitle', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
        return view('dashboard.respondenList', compact('attendances'));
    }

    public function deleteTask($slug)
{
    $questionTitle = QuestionTitle::where('slug', $slug)->first();

    if (!$questionTitle) {
        return redirect()->back()->with('error', 'Soal tidak ditemukan');
    }

    $questionTitle->tasks->each(function ($task) {
        $task->answers()->delete();
    });

    $questionTitle->tasks()->delete();

    $questionTitle->delete();

    return redirect()->back()->with('success', 'Soal berhasil dihapus');
}
}
