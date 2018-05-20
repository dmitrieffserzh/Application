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

// DEFAULT PAGE
Route::get('/', 'PostController@index')->name('home');

// AUTH
Auth::routes();
Route::post('/login', 'Auth\LoginController@ajax_auth');

// USERS
Route::get('users', 'ProfileController@index')->name('users.list');
Route::get('user/id{id}', 'ProfileController@profile')->name('users.profile');
Route::get('user/id{id}/edit', 'ProfileController@edit')->name('users.profile.edit');
Route::post('user/id{id}/update', 'ProfileController@update')->name('users.profile.update');

// POSTS
//Route::resource('posts','PostController');


Route::group(['middleware' => 'filter.view.counts'], function() {
    Route::get('posts', 'PostController@index')->name('posts.index');
    Route::get('posts/post_id{id}', 'PostController@show')->name('post.view');
});


//Route::get('posts', 'PostController@index')->name('posts.index');
//Route::post('posts', 'PostController@index')->name('posts.index');
//Route::post('posts/create_in_list', 'PostController@createInList')->name('posts.create_in_list');
//Route::post('upload','PostController@upload')->name('upload');

// LIKE
Route::post('like', ['as' => 'like', 'uses' => 'LikeController@like']);

// IMAGE UPLOADER
Route::post('image_upload', 'ImageController@upload')->name('image.upload');


// FOLLOWERS
Route::post('follow_handler','FollowController@follow')->name('follow_handler');