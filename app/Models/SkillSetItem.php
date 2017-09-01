<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSetItem extends Model
{
    protected $fillable = ['skill_set_id', 'title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skillSet()
    {
        return $this->belongsTo(SkillSet::class);
    }

    public function skillSetSubitems()
    {
        return $this->hasMany(SkillSetSubitem::class);
    }
}
