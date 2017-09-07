<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SkillSetResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'permalink'     => $this->permalink,
            'description'   => $this->description,
            'cover_image'   => $this->cover_image,
            'public'        => $this->public,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'is_subscriber' => $this->subscribers()->whereEmail(auth()->user()->email)->exists(),
            'author'        => $this->author,
            'tags'          => $this->tagged,
            'items'         => $this->skillSetItems,
        ];
    }
}
