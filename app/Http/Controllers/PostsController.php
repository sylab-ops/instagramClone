<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }

    public function  create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads','public');

            //Intervention/image is a php image library that is used to manipulated images in PHP frameworks
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500, 1500);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
            return redirect('/profile/' . auth()->user()->id);
    }

    //On click method to display Image post caption
    // Adding the \APP\Post is called => Route model binding, this wil make laravel fetch the post details
    // from the database
    public function show(\App\Post $post)
    {
            // The method compact does match the variable post to it actual post value
            return view('posts.show', compact('post'));
    }
}
