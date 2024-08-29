<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function indexTeacher()
    {
        return view('teacher.index');
    }

    public function createMateri()
    {
        $categoryMateri = Category::findOrFail(1);
        return view('teacher.createMateri', [
            'category' => $categoryMateri,
        ]);
    }

    public function storeMateri(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        if($validate->fails())
        {
            return redirect('dashboard/create-materi')->withInput()->with(['success' => 'ada yang belum diisi']);
        }
        

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect('dashboard/create-materi')->with(['success' => 'data berhasil diposting']);

    }
    

    public function showPost()
    {
        $posts = Post::all();
        return view('teacher.postList', compact('posts'));
    }
   
    public function editPost(Post $post)
    {
        $category = Category::all();
        return view('teacher.editPost', compact('post','category'));
    }
    
    public function updatePost(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard/list-post')->with(['success' => 'data berhasil diupdate']);
    }

    public function indexMateri()
    {
        $posts = Post::all()->where('category_id', 1);
        return view('materi.index', compact('posts'));
    }

    public function showMateri(Post $post)
    {
        $posts = Post::find($post);
        return view('materi.details', compact('post'));
    }

}
