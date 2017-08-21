<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'job_title',
        'profile_image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullName'];

    /**
     * Concatenate first and last name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->attributes['firstName'] . ' ' . $this->attributes['lastName'];
    }

    public function scopeJoinedGalaxies($query)
    {
        return auth()->user()->galaxies();
    }

    /**
     * Auto hash password
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function galaxies()
    {
        return $this->belongsToMany(Galaxy::class)->withTimestamps();
    }
}
