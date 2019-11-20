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
    if (Auth()->user())
        return redirect()->route('show-edit-user');
    else return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register-form', 'UserController@RegisterForm')->name('RegisterForm');
Route::post('register-register', 'UserController@UserRegister')->name('UserRegister');


Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('sendmail', 'AdminController@CreateUser')->name('sendMail');
        Route::get('list', 'UserController@getUserIndex')->name('GetUserList');
        Route::get('client', 'UserController@AdminListUsers')->name('AdminGetUserList');
        Route::get('admin_delete_client/{id}','UserController@DeleteUser')->name('DeleteUser');
    });
});

Route::prefix('user')->group(function () {
    Route::post('changePassword', 'UserController@UserPassword')->name('ChangePassword');
    Route::get('edit-user', 'UserController@ShowEditUser')->name('show-edit-user');
    Route::post('edit', 'UserController@EditUser')->name('EditUser');
});