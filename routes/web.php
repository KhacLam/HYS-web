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
use App\User;

// frontend
Route::get('wel', function () {
    return view('welcome');
});

Route::get('/', 'FrontController@index');;
Route::get('contact', 'FrontController@contact');
Route::get('posts', 'FrontController@post');
Route::get('library', 'FrontController@lib');
Route::get('about', 'FrontController@about');

Route::get('posts/cate/{id}/{slug}', [
    'uses'=>'FrontController@catesingle',
    'as'=>'catesingle'
]);

Route::get('posts/{slug}', [
    'uses'=>'FrontController@postsingle',
    'as'=>'postsingle'
]);

Route::get('clubs/{slug}', [
    'uses'=>'FrontController@clubsingle',
    'as'=>'clubsingle'
]);

Route::post('search', 'FrontController@search');
Route::post('comment/{id}', 'FrontController@comment');
Route::post('message', 'FrontController@message');

// backend
Route::get('/manage', 'AdminController@index');
Route::group(['middleware' => 'web'], function () {
    Route::resource('manage/post', 'AdPostController');  
    Route::resource('manage/categories', 'CategoryController');  
    Route::resource('manage/users', 'UserController');  
    Route::resource('manage/setting/infor', 'SettingController');  
    Route::resource('manage/setting/lib', 'LibController');  

    Route::resource('manage/setting/club', 'ClubController'); 
    
    Route::get('manage/setting/slide/show/{id}', 'SlideController@hien');
    Route::get('manage/setting/slide/hide/{id}', 'SlideController@hide');
    

    Route::get('manage/setting/lib/show/{id}', 'LibController@hien');
    Route::get('manage/setting/lib/hide/{id}', 'LibController@hide');
    Route::resource('manage/setting/slide', 'SlideController');
    Route::get('manage/posts/{slug}', [
        'uses'=>'AdPostController@single',
        'as'=>'single'
    ]);
    Route::get('manage/message', [
        'uses'=>'AdminController@message',
        'as'=>'mes'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@getLogOut');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
