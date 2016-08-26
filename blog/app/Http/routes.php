<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Authentication
Route::get('auth/login', [
    'uses'=> 'Auth\AuthController@getLogin',
    'as'=> 'login'
]);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'=> 'logout'
]);


//Password Reset
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

//Registration
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('blog/{slug}',[
    'uses'=> 'BlogController@getSingle',
    'as'=> 'blog'
])->where('slug', '[\w\d\-\_]+');

Route::get('blog', [
    'uses'=> 'BlogController@getIndex',
    'as'=> 'blog.index'
]);

Route::get('/', [
    'uses'=> 'PagesController@getIndex',
    'as'=> 'welcome'
]);

Route::get('/about', [
    'uses'=> 'PagesController@getAbout',
    'as'=> 'about'
]);

Route::get('/contact', [
    'uses'=> 'PagesController@getContact',
    'as'=> 'contact'
]);

Route::post('/contact', [
    'uses'=> 'PagesController@postContact',
    'as'=> 'contact'
]);


Route::resource('posts', 'PostController');

//Categories
Route::resource('categories', 'CategoryController', ['except'=> ['create']]);

Route::resource('tags', 'TagController', ['except'=> ['create']]);

//comments
Route::post('comments/{post_id}', [
    'uses'=> 'CommentController@store',
    'as'=> 'comments.store'
]);
Route::get('comments/{id}/edit', [
    'uses'=> 'CommentController@edit',
    'as'=> 'comments.edit'
]);
Route::put('comments/{id}', [
    'uses'=> 'CommentController@update',
    'as'=> 'comments.update'
]);
Route::delete('comments/{id}', [
    'uses'=> 'CommentController@destroy',
    'as'=> 'comments.destroy'
]);
Route::get('comments/{id}/delete', [
    'uses'=> 'CommentController@delete',
    'as'=> 'comments.delete'
]);