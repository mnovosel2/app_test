<?php

class AccountController extends \BaseController {

	public function loginForm(){

        return View::make('account.login');

    }

    public function registerForm(){

        return View::make('account.register');

    }

    public function logout(){

        Auth::logout();

        return Redirect::route('loginRoute');

    }

}