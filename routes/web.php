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


Route::group([
    'middleware' => 'auth'
], function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('eventusers/{id}', 'EventMemberController@getNames');

    Route::get('eventlist', 'EventController@getMyEvents');

    Route::get('lessons', 'HomeController@showLesson')->name('lessons');

    Route::get('lessonday/{day}', 'LessonController@showDay')->name('day');

    Route::get('/class', 'ClassmemberViewController@index')->name('class');
    Route::get('/teachers', 'TeacherController@table')->name('teachers');
    Route::prefix('events')->group(function () {
        Route::get('/', 'EventViewController@index')->name('eventlist');
        Route::get('/add', 'EventViewController@add')->name('addevent');
        Route::get('edit/{id}', 'EventViewController@edit')->middleware('isCreator');;
        Route::post('edit/{id}', 'EventViewController@update');
        Route::post('delete/{id}', 'EventController@delete');
        Route::post('create', 'EventViewController@create');

    });

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
});

