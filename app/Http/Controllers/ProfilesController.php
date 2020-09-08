<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index(\App\User $user)
    {
        return view('profiles/index', [
            'user' => $user,
        ]);
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile); //Authorize this user to update this profile.
        
        return view('profiles.edit', compact('user')); //compact is an alternative way of passing the user in.
    }

    public function update(\App\User $user)
    {
        $this->authorize('update', $user->profile); //Authorize this user to update this profile.

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        
        // Edit only if authenticated
        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }

}

