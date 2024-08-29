<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function storeImageMateri(Request $request)
    {
        $this->validate($request,[
            'image' => 'required | image',            
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        
        Image::create([
            'image' => $request->image_name,                        
        ]);

        return response()->json(["message" => "Upload Success"]);

    }
}
