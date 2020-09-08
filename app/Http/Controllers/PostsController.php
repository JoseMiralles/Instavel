<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'image' => ['required', 'image']
        ]);

        // Store it in uploads directroy.
        // Remember to tell laravel to link that directory: 'php artisan storage:link'
        // Files would then be in /storage/uplodas/{filename}
        $imagePath = request('image')->store('uploads', 'public');

        /** Crop the image for it to be a square.
         * This should probably not be done.
         */
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        // Only works if authenticated.
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    /**
     * Renders a single post.
     * Notice "\App\Post" in the argument.
     */
    public function show(\App\Post $post)
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }

}
