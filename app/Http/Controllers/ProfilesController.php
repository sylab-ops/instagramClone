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
    public function index($user)
    {
        //The dd method represent development and the main takes is to echo out all variable before terminating the process.
        $user = User::find($user);

        return view('home', [
                'user' => $user,
        ]);   
    }
}
    