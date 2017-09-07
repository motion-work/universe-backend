<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewSkillSetRequest;
use App\Http\Resources\SkillSetResource;
use App\Models\SkillSet;
use Illuminate\Http\Request;

class SkillSetController extends Controller
{

    /**
     * Get all skill sets from this galaxy
     *
     * @return mixed
     */
    public function getSkillSets()
    {
        $skillSets = SkillSet::with(['author', 'tagged'])->get();

        return $skillSets;
    }

    /**
     * Get a specific skill
     *
     * @param $skillSetPermalink
     *
     * @return mixed
     */
    public function getSkillSet($skillSetPermalink)
    {
        $skillSet = SkillSet::wherePermalink($skillSetPermalink)
            ->with(['author', 'tagged', 'skillSetItems', 'skillSetItems.skillSetSubitems'])
            ->firstOrFail();

        return new SkillSetResource($skillSet);
    }
}
