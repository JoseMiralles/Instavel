<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        // This sends users to the login page if they are not logged in.
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        // Validate the fields.
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        // Only works if authenticated.
        auth()->user()->posts()->create($data);
    }
}
