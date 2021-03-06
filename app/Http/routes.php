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

Route::get('auth/github/callback', 'Auth\AuthController@handleProviderGithub');
Route::get('auth/google/callback', 'Auth\AuthController@handleProviderGoogle');

Route::get('auth/login', function () {
    return view('login');
});

Route::get('revisions', 'RevisionsController@index');
Route::get('revisions/{revision}', 'RevisionsController@show');

Route::post('revisions/{revision}/logs', 'RevisionLogsController@store');
Route::get('revisions/{revision}/logs', 'RevisionLogsController@index');
Route::get('revisions/{revision}/logs/create', 'RevisionLogsController@create');
Route::get('revisions/{revision}/logs/{revision_log}', [
    'as' => 'revisions::logs::show',
    'uses' => 'RevisionLogsController@show'
]);

Route::get('users', 'UsersController@index');
Route::get('users/{user}', 'UsersController@show');

Route::group(['middleware' => 'api', 'prefix' => 'api'], function () {
    Route::get('revisions', function () {
        return App\Revision::all();
    });

    Route::get('logs', function () {
        return App\RevisionLog::with('user')->get();
    });
});

Route::group(['middleware' => 'webhooks'], function () {
    Route::get('auth/github', 'Auth\AuthController@redirectToGithub');
    Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
});


