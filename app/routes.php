<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', function(){
   return View::make('users.login');
});

Route::post('api/login', function(){

   if(Auth::attempt([ 'email' => Input::get('email'), 'password' => Input::get('password') ], true))
   {
       $authToken = AuthToken::create(Auth::user());
       $publicToken = AuthToken::publicToken($authToken);


       return $publicToken;
   }

});

Route::group(array('before' => 'auth.token'), function() {
    Route::get('api/data', function() {
        return "Protected data!";
    });
});


/***************************AuthToken*****************************/
Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');
