<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/single-post/{id}', 'PostController@singlePost')->name('single-post');

Route::get('/about', function () {
    return view('website.about');
});
Route::get('/category', function () {
    return view('website.category');
});
Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/post', function () {
    return view('website.post');
});

//admin panel route
Route::get('/test', function () {
    return view('layouts.admin');
});

Route::group(['prefix'=>'admin','middlewire'=>'auth.'], function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    Route::resource('category','CategoryController');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');
    Route::resource('comments','CommentController');

});


