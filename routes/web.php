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
Route::get('candidates/result', 'CandidateController@result')->name('candidates.result')->middleware('auth');

Route::get('candidates/result_district', 'CandidateController@resultDistrict')->name('candidates.resultDistrict')->middleware('auth');
Route::resource('candidates', 'CandidateController')->middleware('auth');
Route::resource('parties', 'PartyController')->middleware('auth');
Route::resource('voters', 'VoterController')->middleware('auth');
Route::resource('districts', 'DistrictController')->middleware('auth');

Route::get('elections/voter_login', 'ElectionController@voter_login')->name('elections.voter_login');

Route::get('elections/{voter}/cast_vote', 'ElectionController@cast_vote')->name('elections.cast_vote');

Route::get('elections/auth_voter', 'ElectionController@auth_voter')->name('elections.auth_voter');



Route::put('elections/{candidate}/{voter}/save_vote', 'ElectionController@save_vote')->name('elections.save_vote');



Route::get('/home', 'HomeController@index')->name('home');
