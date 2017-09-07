<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Subscribe to skill set
     *
     * @param Request $request
     * @param         $id
     */
    public function subscribeToSkillSet(Request $request, $id)
    {
        auth()->user()->subscribedSkillSets()->attach($id);

        response()->json('successfully subscribed to skill set');
    }

    /**
     * Unsubscribe to skill set
     *
     * @param Request $request
     * @param         $id
     */
    public function unsubscribeToSkillSet(Request $request, $id)
    {
        auth()->user()->subscribedSkillSets()->detach($id);

        response()->json('successfully unsubscribed to skill set');
    }

    public function mySkills()
    {
        return auth()->user()->subscribedSkillSets()->get();
    }

}
