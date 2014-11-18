<?php

class AccountController extends \BaseController {

	public function LoginForm(){

        return View::make('users.login');

    }

    public function RegisterForm(){

        return View::make('users.register');

    }

}