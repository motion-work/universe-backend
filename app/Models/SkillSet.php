<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'permalink', 'cover_image'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['permalink'] = str_slug($value . ' ' . str_random());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function galaxy()
    {
        return $this->belongsTo(Galaxy::class);
    }

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

}
