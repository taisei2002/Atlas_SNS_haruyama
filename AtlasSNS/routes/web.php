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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {return view('welcome');});
//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/', 'UsersController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
//トップページ
Route::get('/top', 'UsersController@index');
Route::get('/home', 'UsersController@index');
//プロフィール画面
Route::get('/profile','UsersController@profile');
//プロフィール編集
Route::get('user/edit', 'UserController@edit');
Route::post('/profile','UsersController@profile_update');

//ユーザー検索
Route::get('/search','UsersController@search');
//フォロー・フォロワー機能実装
Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');
//ログアウト機能
Route::get('/logout', 'Auth\LoginController@logout');
//クリエイト機能
Route::post('/post','PostsController@create');
//デリート機能
Route::get('/post/{id}/delete','PostsController@delete');
//編集機能
Route::get('/post/update/{id}','PostsController@update');
