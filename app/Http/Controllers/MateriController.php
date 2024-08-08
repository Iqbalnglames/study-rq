<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\ClassLevel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function indexKelas() 
    {
        $class = ClassLevel::all();

        return view('kelas.index', compact('class'));
    }

    public function indexMateri($classLevel)
    {
        $materials = ClassLevel::where('slug', $classLevel)->first()->materials()->get();

        return view('materi.index', compact('materials'));
    }

    public function indexMateriDashboard()
    {
        $materials = Material::all();

        return view('dashboard.materiList', compact('materials'));
    }

    public function show($classLevel, $material)
    {
        $material = Material::where('slug', $material)
        ->whereHas('classLevel', function ($query) use ($classLevel) {
            $query->where('slug', $classLevel);
        })->first();

        return view('materi.detail', compact('material'));
    }

    public function create()
    {
        $classLevels = ClassLevel::all();

        return view('dashboard.materiCreator', compact('classLevels'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title' => 'required',
            'class_level_id'  => 'required | numeric',
            'body'  => 'required',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput()->with(['error' => 'kolom tidak boleh kosong!']);
        }

        Material::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'class_level_id' => $request->class_level_id,
            'body' => $request->body,
        ]);

        return redirect('dashboard/list')->with(['success' => 'data berhasil diposting']);
    }

    public function edit($id)
    {
        $editMateri = Material::findOrFail($id);
        $classLevels = ClassLevel::all();

        return view('dashboard.editMateri', compact('editMateri', 'classLevels'));

    }

    public function update(Request $request, $id)
    {
        $editMateri = Material::findOrFail($id);

        $validate = Validator::make($request->all(),[
            'title' => 'required',
            'body' => 'required',
            'class_level_id' => 'required'
        ]);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput()->with(['error', 'kolom tidak boleh kosong!']);
        }

        $editMateri->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'class_level_id' => $request->class_level_id,
            'body' => $request->body,
        ]);

        return redirect('dashboard/list')->with(['success' => 'data berhasil di update']);

    }

    public function delete($id)
    {
        $deleteMateri = Material::findOrFail($id);

        $deleteMateri->delete();

        return redirect('dashboard/list')->with(['success' => 'data berhasil dihapus']);
    }

}
