<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/login', 'login')->name('login');
Route::post('/login', 'UserController@login');
Route::post('/logout', 'UserController@logout');
Route::view('/register', 'register')->name('register');
Route::post('/register', 'UserController@register');
Route::view('/createPost', 'posts.create');
Route::view('/showPosts', 'posts.show');
Route::view('/showMyPosts', 'posts.myPosts');
Route::resource('posts', 'PostController');
Route::get('/myPosts', 'PostController@myposts');




