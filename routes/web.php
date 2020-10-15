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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page-for-emails', function () {
    return view('allgood');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/telegram-get-messages', 'TelegramsController@telega');
Route::get('/send-mails', 'mailSenderController@sendMails')->name('send-mails');
Route::post('/send-mails', 'mailSenderController@sendMails')->name('send-mails');
//Route::get('/telegram-get-messages', 'HomeController@telega');



