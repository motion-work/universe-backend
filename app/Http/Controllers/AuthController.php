<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewUserRequest;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function joinedGalaxies()
    {
        return response()->json(User::joinedGalaxies()->get());
    }

    /**
     * @param StoreNewUserRequest $request
     *
     * @return mixed
     */
    public function register(StoreNewUserRequest $request)
    {
        $user = User::create($request->all());

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => env('GRANT_TYPE'),
                'client_id' => env('CLIENT_ID'),
                'client_secret' => env('CLIENT_SECRET'),
                'username' => $user->email,
                'password' => $request->get('password'),
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
