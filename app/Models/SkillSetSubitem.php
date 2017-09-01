<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSetSubitem extends Model
{
    protected $fillable = ['skill_set_item_id', 'title', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skillSetItem()
    {
        return $this->belongsTo(SkillSetItem::class);
    }
}
