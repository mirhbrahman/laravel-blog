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
//.............PUBLIC AREA
Route::get('/','FrontEndController@index')->name('index');
Route::get('/post/{slug}','FrontEndController@singlePost')->name('post.single');
Route::get('/post/category/{id}','FrontEndController@category')->name('post.category');
Route::get('/search','FrontEndController@search')->name('post.search');


//.............ADMIN AREA
Auth::routes();

//........only admin
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
    //.........user
    Route::resource('user','UsersController');
    Route::get('user/delete/{id}','UsersController@destroy')->name('user.delete');
    Route::get('user/admin/{id}','UsersController@admin')->name('user.admin');
    Route::get('user/not-admin/{id}','UsersController@not_admin')->name('user.not.admin');

    //...........site setting
    Route::get('setting','SettingsController@index')->name('setting.index');
    Route::post('setting/update','SettingsController@update')->name('setting.update');
});

//........other user
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    //..........user profile
    Route::get('user-p/profile','ProfilesController@index')->name('user.profile.index');
    Route::post('user/profile/update','ProfilesController@update')->name('user.profile.update');
    //..........post
    Route::resource('post','PostsController');
    Route::get('post/delete/{id}','PostsController@destroy')->name('post.delete');
    Route::get('posts/trashed','PostsController@trashed')->name('post.trashed');
    Route::get('post/kill/{id}','PostsController@kill')->name('post.kill');
    Route::get('post/restore/{id}','PostsController@restore')->name('post.restore');

    //......category
    Route::resource('category','CategoriesController');
    Route::get('category/delete/{id}','CategoriesController@destroy')->name('category.delete');

    //......tag
    Route::resource('tag','TagsController');
    Route::get('tag/delete/{id}','TagsController@destroy')->name('tag.delete');
});
