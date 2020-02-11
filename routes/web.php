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

Route::namespace('auth')->group(function(){
    Route::get('register', 'RegisterController@registerView')->name('register-view');
    Route::post('register-verification', 'RegisterController@registerVerification')->name('register-verification');
    Route::post('register-check-verification', 'RegisterController@registerCheckVerification')->name('register-check-verification');
});

Route::namespace('ticket')->prefix('ticket')->group(function(){
    Route::get('department-list', 'TicketController@departmentList')->name('department-list');
    Route::get('priority-list', 'TicketController@priorityList')->name('priority-list');

   Route::get('submit', 'TicketController@submitTicket')->name('submit');
   Route::get('list', 'TicketController@listTicket')->name('list');
   Route::post('submit-request', 'TicketController@submitRequest')->name('submit-request');
});
