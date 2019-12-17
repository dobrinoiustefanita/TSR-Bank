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
        return redirect()->route('EditClients');
    else return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('register-form', 'UserController@RegisterForm')->name('RegisterForm');
Route::post('register-register', 'UserController@UserRegister')->name('UserRegister');

Route::get('create_clients', 'ClientController@getCreateClients')->name('CreateClients');
Route::post('create_clients', 'ClientController@postCreateClients')->name('CreateClients');
Route::get('edit_clients', 'ClientController@getEditClient')->name('EditClients');
Route::post('edit_clients', 'ClientController@postEditClient')->name('EditClients');


Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('sendmail', 'AdminController@CreateUser')->name('sendMail');
        Route::post('deposit', 'UserController@DepositToAccount')->name('DepositToAccount');
        Route::get('list', 'UserController@getUserIndex')->name('GetUserList');
        Route::get('client', 'UserController@AdminListUsers')->name('AdminGetUserList');
        Route::get('admin_delete_client/{id}','UserController@DeleteUser')->name('DeleteUser');
    });
});

Route::prefix('user')->group(function () {
    Route::post('changePassword', 'UserController@UserPassword')->name('ChangePassword');
    Route::get('edit-user', 'UserController@ShowEditUser')->name('show-edit-user');
    Route::get('check-balance', 'UserController@CheckBalance')->name('CheckBalance');
    Route::post('edit', 'UserController@EditUser')->name('EditUser');
});

Route::prefix('user')->group(function () {
    Route::get('show-send-money', 'TransactionController@ShowSendMoney')->name('show-send-money');
    Route::get('show-transaction-history', 'TransactionController@ShowTransactionHistory')->name('ShowTransactionHistory');
    Route::post('send-money', 'TransactionController@SendMoney')->name('SendMoney');
});