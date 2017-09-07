<?php

namespace App\Http\Controllers;

use App\Models\SkillSet;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function skillSets($query)
    {
        return SkillSet::search($query)->get();
    }
}
