<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role',
        'confirm',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function activation()
    {
        return $this->hasOne('App\Activation');
    }
    public function turoringInfo()
    {
        return $this->hasOne('App\Tutor\TutoringBasicInfo');
    }
    public function education()
    {
        return $this->hasMany('App\Tutor\EducationalInfo');
    }
    public function personal()
    {
        return $this->hasMany('App\Tutor\PersonalInfo');
    }

    public function overview()
    {
        return $this->hasOne('App\Tutor\OverView');
    }
}
