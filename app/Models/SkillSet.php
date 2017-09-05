<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    use Taggable;

    protected $fillable = ['user_id', 'name', 'description', 'permalink', 'cover_image'];

    /**
     * Auto generate permalink
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['permalink'] = str_slug($value . ' ' . str_random());
    }

    /**
     * Skill set has one creator/author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function galaxy()
    {
        return $this->belongsTo(Galaxy::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function galaxies()
    {
        return $this->belongsToMany(Galaxy::class)->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skillSetItems()
    {
        return $this->hasMany(SkillSetItem::class);
    }

    /**
     * Skill sets can have many subscribers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'skill_set_subscriber', 'skill_set_id', 'user_id');
    }

}
