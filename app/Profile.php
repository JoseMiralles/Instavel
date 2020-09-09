<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    //Disable mass assigment since we are validating in the controller.
    protected $guarded =[];

    /**
     * Each profile belongs to a user in the users table.
     * This means that $myProfile->user is a property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * This controlls this profile being followed by a class.
     */
    public function following()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Returns the profile image if it exists.
     * Otherwise, it returns the placeholder image.
     */
    public function profileImage()
    {
        return ($this->image) ? '/storage/' . $this->image : "/images/profile_pic.png";
    }
}
