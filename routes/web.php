<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('id','([0-9]*)');
Route::pattern('slug','(.*)');

Route::get('', [
	'uses' => 'Singer\IndexController@index',
	'as' => 'singer.index'
]);

Route::namespace('Auth')->group(function(){
	Route::get('login', [
		'uses' => 'AuthController@getLogin',
		'as' => 'auth.auth.login'
	]);
	Route::post('login', [
		'uses' => 'AuthController@postLogin',
		'as' => 'auth.auth.login'
	]);
	Route::get('logout', [
		'uses' => 'AuthController@logout',
		'as' => 'auth.auth.logout'
	]);
});

Route::namespace('Admin')->middleware('auth')->group(function(){
// Index ADMIN	
	Route::prefix('admin')->group(function(){
		Route::get('', [
			'uses' => 'IndexController@index',
			'as' => 'admin.index.index'
		]);
		Route::prefix('video')->group(function(){
			Route::get('', [
				'uses' => 'YoutubeController@index',
				'as' => 'admin.video.index'
			]);
			Route::get('add', [
				'uses' => 'YoutubeController@getAdd',
				'as' => 'admin.video.add'
			]);
			Route::post('add', [
				'uses' => 'YoutubeController@postAdd',
				'as' => 'admin.video.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'YoutubeController@getEdit',
				'as' => 'admin.video.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'YoutubeController@postEdit',
				'as' => 'admin.video.edit'
			]);
			Route::get('delete/{id}', [
				'uses' => 'YoutubeController@delete',
				'as' => 'admin.video.delete'
			]);
		});
		Route::prefix('mp3')->group(function(){
			Route::get('', [
				'uses' => 'Mp3Controller@index',
				'as' => 'admin.mp3.index'
			]);
			Route::get('add', [
				'uses' => 'Mp3Controller@getAdd',
				'as' => 'admin.mp3.add'
			]);
			Route::post('add', [
				'uses' => 'Mp3Controller@postAdd',
				'as' => 'admin.mp3.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'Mp3Controller@getEdit',
				'as' => 'admin.mp3.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'Mp3Controller@postEdit',
				'as' => 'admin.mp3.edit'
			]);
			Route::get('delete/{id}', [
				'uses' => 'Mp3Controller@delete',
				'as' => 'admin.mp3.delete'
			]);
		});
		Route::prefix('picture')->group(function(){
			Route::get('', [
				'uses' => 'PictureController@index',
				'as' => 'admin.picture.index'
			]);
			Route::get('add', [
				'uses' => 'PictureController@getAdd',
				'as' => 'admin.picture.add'
			]);
			Route::post('add', [
				'uses' => 'PictureController@postAdd',
				'as' => 'admin.picture.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'PictureController@getEdit',
				'as' => 'admin.picture.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'PictureController@postEdit',
				'as' => 'admin.picture.edit'
			]);
			Route::get('delete/{id}', [
				'uses' => 'PictureController@delete',
				'as' => 'admin.picture.delete'
			]);
		});
		Route::prefix('user')->group(function(){
			Route::get('', [
				'uses' => 'UserController@index',
				'as' => 'admin.user.index'
			]);
			Route::get('add', [
				'uses' => 'UserController@getAdd',
				'as' => 'admin.user.add'
			]);
			Route::post('add', [
				'uses' => 'UserController@postAdd',
				'as' => 'admin.user.add'
			]);
			Route::get('edit/{id}', [
				'uses' => 'UserController@getEdit',
				'as' => 'admin.user.edit'
			]);
			Route::post('edit/{id}', [
				'uses' => 'UserController@postEdit',
				'as' => 'admin.user.edit'
			]);
			Route::get('delete/{id}', [
				'uses' => 'UserController@delete',
				'as' => 'admin.user.delete'
			]);
		});
		Route::prefix('contact')->group(function(){
			Route::get('', [
				'uses' => 'ContactController@index',
				'as' => 'admin.contact.index'
			]);
			Route::get('delete/{id}', [
				'uses' => 'ContactController@delete',
				'as' => 'admin.contact.delete'
			]);
		});
	});
	
});