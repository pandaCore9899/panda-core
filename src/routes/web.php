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

Route::get('/', function () {
    return view(viewIndex('pages.home'));
})->name('home');
Route::get('/account.index', function () {
    return view(viewIndex('pages.home'));
})->name('account.index');

Route::get('/account','User\UserController@index')->name('account_management');
Route::post('/account.delete','User\UserController@delete')->name('account_management.delete');
Route::get('/account.import', 'User\UserController@importIndex')->name('account_management.import.index');
Route::post('/account.import', 'User\UserController@import')->name('account_management.import.save');
Route::post('/account.import.confirm', 'User\UserController@confirmIndex')->name('account_management.confirm.confirm');
Route::get('/account.import.result', 'User\UserController@confirmResult')->name('account_management.confirm.result');
Route::get('/admin',function(){
    return view(viewIndex('pages.users'));
})->name('admin_management');
Route::get('/lesson',function(){
    return view(viewIndex('pages.users'));
})->name('lesson_schedule_management');
Route::get('/lesson_student',function(){
    return view(viewIndex('pages.users'));
})->name('lesson_student_management');
Route::get('/lesson_material',function(){
    return view(viewIndex('pages.users'));
})->name('material_management');