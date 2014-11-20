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
Route::get('/',function(){
    return View::make('home.index');
});
/**************Views******************/
Route::get('/admin', ['as' => 'adminPanelRoute', 'uses' => 'PanelController@index']);
Route::get('/account/logout', [ 'as' => 'logoutRoute', 'uses' => 'AccountController@logout' ]);
Route::get('/account/login', [ 'as' => 'loginRoute', 'uses' => 'AccountController@loginForm' ]);
Route::get('/account/register', [ 'as' => 'registerRoute', 'uses' => 'AccountController@registerForm' ]);
/**************Views******************/

/***************API******************/
Route::post('/api/account/registration', ['as' => 'registerApiRoute', 'uses' => 'AccountApiController@register']);
Route::post('/api/account/login', ['as' => 'loginApiRoute', 'uses' => 'AccountApiController@login']);
/***************API******************/

Route::group(array('before' => 'auth.token'), function() {
    Route::post('api/data', function(){
        return Token::getUserInstance();
    });
});


/***************************AuthToken*****************************/
Route::get('auth', 'Tappleby\AuthToken\AuthTokenController@index');
Route::post('auth', 'Tappleby\AuthToken\AuthTokenController@store');
Route::delete('auth', 'Tappleby\AuthToken\AuthTokenController@destroy');
/***************************AuthToken*****************************/

/**************************Resource******************************/
Route::resource('users', 'UsersController');
