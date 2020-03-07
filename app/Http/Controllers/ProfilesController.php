<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
        return view('profiles.edit', compact('user'));
    }
}
    