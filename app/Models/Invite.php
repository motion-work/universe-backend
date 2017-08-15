<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = ['galaxy_id', 'email', 'token'];

    /**
     * Invite belongs to one galaxy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function galaxy()
    {
        return $this->belongsTo(Galaxy::class);
    }
}
