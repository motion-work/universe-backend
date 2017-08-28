<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'permalink'];

    /**
     * Auto generate permalink
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
        $this->attributes['permalink'] = str_slug($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    /**
     * Galaxy has many invites
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invites()
    {
        return $this->hasMany(Invite::class);
    }

    public function skillSets()
    {
        return $this->belongsToMany(SkillSet::class)->withTimestamps();
    }

}
