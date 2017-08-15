<?php

namespace App\Http\Controllers;

use App\Models\Galaxy;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    public function process(Request $request, $permalink)
    {
        // validate the incoming request data

        do {
            //generate a random string using Laravel's str_random helper
            $token = str_random(32);
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        //create a new invite record
        $invite = Invite::create([
            'galaxy_id' => Galaxy::wherePermalink($permalink)->first(['id'])->id,
            'email'     => $request->get('email'),
            'token'     => $token,
        ]);

        // send the email
        // Mail::to($request->get('email'))->send(new InviteCreated($invite));

        // redirect back where we came from
        return $invite;
    }

    public function accept($permalink, $token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        // delete the invite so it can't be used again
        $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
        return response()->json('Good job! Invite accepted!');
    }
}
