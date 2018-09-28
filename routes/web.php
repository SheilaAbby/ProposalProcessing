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
	
	Route::get('/admin/dashboard','AdminController@index')->name('admin.index');

	Route::get('/admin/dashboard/showNewProposal/{id}','AdminController@showNewProposal')->name('admin.showNewProposal');

	Route::post('/admin/dashboard/updateProposalStatus/{id}','AdminController@proposalUpdates')->name('admin.proposalUpdates');

	Route::get('/admin/dashboard/newProposals','AdminController@uprocessedProposals')->name('admin.newProposals');

	Route::get('/admin/dashboard/Stage-1-Proposals','AdminController@Stage_1_Proposals')->name('admin.Stage_1_Proposals');

	Route::get('/admin/dashboard/showStage1Proposal/{id}','AdminController@showStage1Proposal')->name('admin. showStage1Proposal');

	Route::get('/admin/dashboard/Stage-2-Proposals','AdminController@Stage_2_Proposals')->name('admin.Stage_2_Proposals');

	Route::get('/admin/dashboard/showStage2Proposal/{id}','AdminController@showStage2Proposal')->name('admin. showStage2Proposal');

	Route::get('/admin/dashboard/AcceptedProposals','AdminController@AcceptedProposals')->name('admin.AcceptedProposals');

	Route::get('/admin/dashboard/RejectedProposals','AdminController@RejectedProposals')->name('admin.RejectedProposals');

	//marking sent proposals as read

	Route::get('markAsRead',function(){
		auth()->user()->unreadNotifications->markAsRead();
		return redirect()->back();
	})->name('markRead');
	
});

Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{Verifytoken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


Route::resources([
    'proposals' => 'ProposalController'
    
]);

Route::get('proposal/viewSavedDrafts','ProposalDraftController@viewSavedDrafts')->name('viewSavedDrafts');

Route::get('proposal/{id}/EditDraft','ProposalDraftController@EditDraft')->name('EditDraft');

