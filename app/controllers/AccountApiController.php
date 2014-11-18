<?php

class AccountApiController extends \BaseController {

	public function Register(){

        $password = Input::get('password');

        $email = Input::get('email');

        if(!empty($password) && !empty($email)) {

            $newUser = new User();

            $newUser->fill(Input::except(['_token', 'password']));

            $newUser->password = Hash::make(Input::get('password'));

            try{

                $newUser->save();

            }catch (Exception $e){

                return [ 'status' => false ];

            }

            return [ 'status' => true ];

        }else
            return [ 'status' => false ];

    }

    public function Login(){

        if(Auth::attempt([ 'email' => Input::get('email'), 'password' => Input::get('password') ], true))
        {
            $authToken = AuthToken::create(Auth::user());
            $publicToken = AuthToken::publicToken($authToken);

            return [ 'status' => true, 'token' => $publicToken ];
        }else{

            return [ 'status' => false ];

        }

    }

}