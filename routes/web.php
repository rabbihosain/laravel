<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\helloController@index');


Route::get('contact', function () {
    return view('contact');
});

Route::get('about', function () {
    return view('about');
});


Route::get('write', 'App\Http\Controllers\postController@writePost');

Route::get('student', function () {
    return view('student');
});


// Category crud are here 
Route::get('add_category', function () {
    return view('add_category');
});
Route::get('all_category', 'App\Http\Controllers\helloController@allCategory');
Route::get('add_category', 'App\Http\Controllers\helloController@addCategory');
Route::post('store_category', 'App\Http\Controllers\helloController@saveCategory');
Route::get('view_category/{id}', 'App\Http\Controllers\helloController@viewCategory');
Route::get('delete_category/{id}', 'App\Http\Controllers\helloController@deleteCategory');
Route::get('edit_category/{id}', 'App\Http\Controllers\helloController@editCategory');
Route::post('update_category/{id}', 'App\Http\Controllers\helloController@updateCategory');


// Posts crud are here 
Route::post('store_post', 'App\Http\Controllers\postController@storePost');
Route::get('all_post', 'App\Http\Controllers\postController@allPost');
Route::get('view_post/{id}', 'App\Http\Controllers\postController@viewPost');
Route::get('delete_post/{id}', 'App\Http\Controllers\postController@deletetPost');
Route::get('edit_post/{id}', 'App\Http\Controllers\postController@editPost');
Route::post('update_post/{id}', 'App\Http\Controllers\postController@updatePost');







