<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('revisions', 'RevisionsController@index');
Route::get('revisions/{revision}', 'RevisionsController@show');

Route::post('revisions/{revision}/logs', 'RevisionLogsController@store');
Route::get('revisions/{revision}/logs', 'RevisionLogsController@index');
Route::get('revisions/{revision}/logs/create', 'RevisionLogsController@create');
Route::get('revisions/{revision}/logs/{revision_log}', [
    'as' => 'revisions::logs::show',
    'uses' => 'RevisionLogsController@show'
]);

Route::group(['middleware' => 'webhooks'], function () {
    Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
});


