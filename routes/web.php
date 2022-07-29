<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','has.permission']],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::resource('departments', 'App\Http\Controllers\DepartmentController');
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::resource('permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('leaves', 'App\Http\Controllers\LeaveController');
    Route::resource('notices', 'App\Http\Controllers\NoticeController');
    Route::post('accept-reject-leave/{id}','App\Http\Controllers\LeaveController@acceptReject')->name('accept.reject');
    Route::get('/mail','App\Http\Controllers\MailController@create')->name('mails.create');
    Route::post('/mail','App\Http\Controllers\MailController@store')->name('mails.store');
});



