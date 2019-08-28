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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']])->middleware('permission:edit users');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::post('schedule/find' , 'ScheduleController@find')->name('schedule.find');
	Route::get('schedule' , 'ScheduleController@index')->name('schedule.index');
	Route::get('schedule/show' , 'ScheduleController@showAll')->name('schedule.showall')->middleware('permission:accept booking');
	Route::post('schedule/approve' , 'ScheduleController@approve')->name('schedule.approve')->middleware('permission:accept booking');
	Route::post('schedule' , 'ScheduleController@store')->name('schedule.store');
	Route::resource('room' , 'RoomController')->middleware('permission:edit rooms');
	Route::post('maintenance','RoomController@maintenance')->name('maintenance')->middleware('permission:edit rooms');
});

