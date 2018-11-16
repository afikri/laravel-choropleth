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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::middleware(['verified'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
  Route::resource('/states', 'StateController');
  Route::resource('/donations', 'DonationController');
  Route::resource('/users', 'UserController');
  Route::resource('/settings', 'SettingController');
  Route::put('tasks/{task_id}/run', 'TaskController@run')->name('tasks.run');
  Route::resource('/donations', 'DonationController');
});
