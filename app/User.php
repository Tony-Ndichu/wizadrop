<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','Profileimage', 'Contact', 'Skillset', 'created_at', 'Experience', 'Bio','remember_token' ,'Active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





public function userprofile()
{
    return $this->hasOne('App\Userprofile', 'registryid');
}

public function thelike()
{
    return $this->hasOne('App\thelike', 'userid');
}

public function thefollow()
{
    return $this->hasMany('App\thefollow', 'userid', 'id');

    return $this->hasMany('App\thefollow', 'personid', 'id');
}

public function chat()
{
    return $this->hasMany('App\Chat', 'sentto', 'id');

    return $this->hasMany('App\Chat', 'sentfrom', 'id');
}

public function SendPasswordResetNotification($token){
    $this->notify(new ResetPassword($token));
}

}