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
/**************Views******************/
Route::get('/account/login', [ 'as' => 'loginRoute', 'uses' => 'AccountController@LoginForm' ]);
Route::get('/account/register', [ 'as' => 'registerRoute', 'uses' => 'AccountController@RegisterForm' ]);
/**************Views******************/

/***************API******************/
Route::post('/api/account/registration', ['as' => 'registerApiRoute', 'uses' => 'AccountApiController@Register']);
Route::post('/api/account/login', ['as' => 'loginApiRoute', 'uses' => 'AccountApiController@Login']);
/***************API******************/

/*
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
*/
Route::group(array('before' => 'auth.token'), function() {
    Route::post('api/data', function() {
        return Auth::user();
    });
});


/***************************AuthToken*****************************/
Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');
