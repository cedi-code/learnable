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
    return view('intro');
});

Route::domain('api.learnable.ch')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/class', 'ClassmemberViewController@index')->name('class');
Route::get('/teachers', 'TeacherController@table')->name('teachers');

Route::get('/changePW', 'UserController@editPW')->name('editpw');
Route::post('/changePW', 'UserController@updatePW')->name('updatepw');

Route::group([
    'middleware' => 'isAdmin'
], function (){
    Route::prefix('edit')->group(function () {
       Route::get('/user/{user}', 'UserController@edit')->name('edituser');
        Route::post('/user/{id}', 'UserController@update')->name('updateuser');
    });


});