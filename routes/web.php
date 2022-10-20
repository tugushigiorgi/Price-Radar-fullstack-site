<?php
use App\Http\Controllers\home;
use App\Http\Controllers\login;
use App\Http\Controllers\profile;
use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;



Route::get('/category/{category_name}',[ home::class,'category']);
Route::get('/',[ home::class,'main']);
Route::post('/',[ home::class,'search']);

Route::get('/register',[register::class,'main']);
Route::post('/register',[register::class,'register']);
Route::get('/login',[login::class,'main']);
Route::post('/login',[login::class,'login']);
Route::get('/profile',[profile::class,'main']) ->middleware('is_logged_in');
Route::get('/logout',[login::class,'logout'])->middleware('is_logged_in');

Route::get('/save/{id}',[ home::class,'save']) ->middleware('is_logged_in');
Route::get('/reset',[login::class,'password_reset'])->middleware('is_logged_in');

Route::get('/reset',[login::class,'password_reset_page'] )->middleware('is_logged_in');

Route::get('/itemdelete/{id}',[home::class,'delete_item'] )->middleware('is_logged_in');
Route::get('/deleteallfavouriteitems',[home::class,'delete_all_item'] )->middleware('is_logged_in');
Route::put('/reset',[login::class,'password_reset'])->middleware('is_logged_in');
Route::get('/userdelete',[login::class,'delete_acc'])->middleware('is_logged_in');


