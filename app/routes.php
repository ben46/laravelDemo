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

Route::get('/users/insert', function()
{
	$ret = DB::insert('insert into users (id, name) values (?, ?)', array(1, 'Dayle'));
	return json_encode($ret);
});

Route::get('/users/q', function()
{
	$user = DB::table('users')->where('id', 1)->first();
	if ($user) {
		return json_encode($user);
	} 
	return 'nothing';
});

Route::get('/users/del', function()
{
	$ret = DB::table('users')->where('id', 1)->delete();
	return $ret.' rows effected';
});


Route::resource('tweets', 'TweetsController');