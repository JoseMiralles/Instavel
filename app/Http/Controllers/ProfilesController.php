<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{

    public function index(\App\User $user)
    {
        $follows = false;
        if (auth()->user()){
            $follows = auth()->user()->following->contains($user->id);
        }

        $postCount = Cache::remember(
            'count.posts' . $user->id,
        now()->addSeconds(30),
        function () use ($user) {
            return $user->posts->count();
        });

        $followerCount = Cache::remember(
            'count.followers' . $user->id,
        now()->addSeconds(30),
        function () use ($user) {
            return $user->profile->following->count();
        });

        $followingCount = Cache::remember(
            'count.following' . $user->id,
        now()->addSeconds(30),
        function () use ($user) {
            return $user->following->count();
        });

        return view('profiles/index', [
            'user' => $user,
            'follows' => $follows,
            'postCount' => $postCount,
            'followerCount' => $followerCount,
            'followingCount' => $followingCount,
        ]);
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile); //Authorize this user to update this profile.
        
        return view('profiles.edit', compact('user')); //compact is an alternative way of passing the user in.
    }

    /**
     * Controlls profile updates
     */
    public function update(\App\User $user)
    {
        $this->authorize('update', $user->profile); //Authorize this user to update this profile.

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (request("image"))
        {
        // Store it in uploads directroy.
        // TODO: add to readme: Remember to tell laravel to link that directory: 'php artisan storage:link'
        // Files would then be in /storage/uplodas/{filename}
        $imagePath = request('image')->store('profile', 'public');

        /** Crop the image for it to be a square.
         * This should probably not be done.
         */
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        //The new image was already uplodaded, so add the image's path to the update.
        $imageArray = ['image' => $imagePath];
        }

        //Update with $data and $imagePath
        auth()->user()->profile->update(
            array_merge($data, 
            $imageArray ?? [], // If $imageArray is null, then pass an empty array to avoid deleteing the profile image.
            )
        );

        return redirect("/profile/{$user->id}");
    }

}

