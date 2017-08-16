<?php

namespace App\Http\Controllers;

use App\Models\Galaxy;
use App\Models\Invite;
use App\Models\User;
use Illuminate\Http\Request;

class InviteController extends Controller
{
    /**
     * @param Request $request
     * @param         $permalink
     *
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function process(Request $request, $permalink)
    {
        // validate the incoming request data
        do {
            //generate a random string using Laravel's str_random helper
            $token = str_random(32);
        } //check if the token already exists and if it does, try again
        while (Invite::where('token', $token)->first());

        $galaxy = Galaxy::wherePermalink($permalink)->first();

        //create a new invite record
        $invite = Invite::create([
            'galaxy_id' => $galaxy->id,
            'email'     => $request->get('email'),
            'token'     => $token,
        ]);

        // send the email
        // Mail::to($request->get('email'))->send(new InviteCreated($invite));

        return response()->json($invite);
    }

    /**
     * @param $permalink
     * @param $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function accept($permalink, $token)
    {
        $invite = Invite::where('token', $token)->first();
        $galaxy = Galaxy::where('permalink', $permalink)->first();

        if (!$invite) {
            abort(404, 'Invite token not found');
        }

        if (auth()->user()->email != $invite->email) {
            abort(401, 'Invite email does not match with your email');
        }

        $galaxy->users()->attach(auth()->user()->id);
        $invite->delete();

        // here you would probably log the user in and show them the dashboard, but we'll just prove it worked
        return response()->json('Invite accepted!');
    }
}
