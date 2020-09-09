<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // Include this since we are using the \User class/model.

class FollowsController extends Controller
{

    public function __construct()
    {
        // Require authentication middleware.
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        // Toggle the following relationship.
        return auth()->user()->following()->toggle($user->profile);
    }
}
