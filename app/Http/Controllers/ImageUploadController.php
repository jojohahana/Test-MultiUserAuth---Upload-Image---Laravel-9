<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    // Index Upload Photp
    // public function index()
    // {
    //     return view('imageUpload');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $imageName = time().'.'.$request->image->extension();

    //     $request->image->move(public_path('images'), $imageName);

    //     /*
    //         Write Code Here for
    //         Store $imageName name in DATABASE from HERE
    //     */

    //     return back()
    //         ->with('success','You have successfully upload image.')
    //         ->with('image',$imageName);
    // }
    // Index Upload & Preview Photo
    public function index()
    {
        return view('image-upload');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/images');


        $save = new Photo;

        $save->name = $name;
        $save->path = $path;

        return redirect('image-upload-preview')->with('status', 'Image Has been uploaded successfully in laravel');

    }

}
