<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Show the user profile dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        //authorise update to chnages made on authorize user profile
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        //authorise update to chnages made on authorize user profile
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
        ]);
        //layer of protection to only authorised users to edit user profile
        auth()->user()->profile->update($data);

        if (request('image'))
        {
            $imagePath = request('image')->store('uploads','public');

            //Intervention/image is a php image library that is used to manipulated images in PHP frameworks
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1500, 1500);
            $image->save();

        }

        return redirect("/profile/{$user->id}");
    }
}
