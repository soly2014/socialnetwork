<?php

/*
|-------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/',
	['uses'=>'\Facemash\Http\Controllers\HomeController@index',
     'as'  =>'home']);

Route::get('search',
	['uses'=>'\Facemash\Http\Controllers\SearchController@getResults',
     'as'  =>'search',
	'middleware'=>['auth'],

     ]);
Route::get('profile/{username}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@getProfile',
     'as'  =>'profile',
	'middleware'=>['auth'],

     ]);
Route::get('profile/update/{id}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@getUpdate',
     'as'  =>'update',
	'middleware'=>['auth'],

     ]);

Route::post('profile/update/{id}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@postUpdate',
     'as'  =>'update',
	'middleware'=>['auth'],

     ]);

Route::get('profile/addfriend/{username}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@addFriend',
     'as'  =>'addfriend',
	'middleware'=>['auth'],

     ]);


Route::post('profile/addfriend/{username}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@addFriend',
     'as'  =>'addfriend',
	'middleware'=>['auth'],

     ]);


Route::get('profile/acceptfriend/{username}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@acceptFriend',
     'as'  =>'acceptfriend',
	'middleware'=>['auth'],

     ]);


Route::post('profile/acceptfriend/{username}',
	['uses'=>'\Facemash\Http\Controllers\ProfileController@acceptFriend',
     'as'  =>'acceptfriend',
	'middleware'=>['auth'],

     ]);

Route::get('/timeline',
	['uses'=>'\Facemash\Http\Controllers\HomeController@showTimeline',
     'as'  =>'timeline',
	'middleware'=>['auth'],

     ]);


Route::get('/friends',
	['uses'=>'\Facemash\Http\Controllers\FriendsController@index',
     'as'  =>'friends',
	'middleware'=>['auth'],

     ]);

Route::post('/status',
	['uses'=>'\Facemash\Http\Controllers\StatusesController@postStatus',
     'as'  =>'status',
	'middleware'=>['auth'],

     ]);

Route::post('/status/reply/{id}',
	['uses'=>'\Facemash\Http\Controllers\StatusesController@replyStatus',
     'as'  =>'status.reply',
	'middleware'=>['auth'],

     ]);



Route::get('/auth/login',[
	'uses'=>'Auth\AuthController@getLogin',
	'middleware'=>['guest'],
	]);


Route::post('/auth/login','Auth\AuthController@postLogin')->middleware('guest');
Route::get('/auth/logout','Auth\AuthController@getLogout');

Route::get('/auth/register','Auth\AuthController@getRegister')
						->name('auth.register')
						->middleware('guest');

Route::post('/auth/register','Auth\AuthController@postRegister')->middleware('guest');


Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('/callback', 'Auth\AuthController@handleProviderCallback');



Route::get('/alerts',function(){

	return redirect()->route('home')->with('info','lolololololololol');
});
