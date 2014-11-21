<?php

class Token {

    public static function  getUserInstance(){

        $token = Input::get('auth_token');

        $req = Request::create('/auth', 'GET', [ 'auth_token' => $token ]);

        $user = Route::dispatch($req)->getContent();

        $arrayData = json_decode($user, true);

        return User::find($arrayData['id']);

    }

}