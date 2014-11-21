<?php

class AccountApiController extends \BaseController {

	public function register(){

        $password = Input::get('password');

        $email = Input::get('email');

        if(!empty($password) && !empty($email)) {
            $newUser = new User();

            $newUser->fill(Input::except(['_token', 'password']));

            $newUser->password = Hash::make(Input::get('password'));

            FileUpload::saveImage('/uploads', 'avatar');

            try{

                $newUser->save();
                $userRole=Role::find(2);
                $newUser->attachRole($userRole);
            }catch (Exception $e){

                return [ 'status' => false ];

            }

            return [ 'status' => true ];

        }else
            return [ 'status' => false ];

    }

    public function login(){

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