<?php

class AccountApiController extends \BaseController {

	public function Register(){

        $newUser = new User();

        $newUser->fill(Input::except(['_token', 'password']));

        $newUser->password = Hash::make(Input::get('password'));

        $newUser->save();

        return $newUser;

    }

    public function Login(){

        if(Auth::attempt([ 'email' => Input::get('email'), 'password' => Input::get('password') ], true))
        {
            $authToken = AuthToken::create(Auth::user());
            $publicToken = AuthToken::publicToken($authToken);

            return [ 'token' => $publicToken ];
        }

    }

}