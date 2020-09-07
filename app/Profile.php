<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Each profile belongs to a user in the users table.
     * This means that $myProfile->user is a property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
