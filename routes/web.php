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

Auth::routes();
Route::get('/home','HomeController@index')->name('home');
Route::post('/login/custom','LoginController@login')->name('login.custom');

//Route group protected by auth middleware
Route::group(['middleware'=>'auth'], function(){
	Route::get('/home',function(){
		return view('home');
	})->name('home');

	Route::get('/admin/dashboard','ProposalController@index')->name('admin.dashboard');
});

Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{Verifytoken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


Route::resources([
    'proposals' => 'ProposalController'
    
]);