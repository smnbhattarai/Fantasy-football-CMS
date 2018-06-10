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

Route::get('/', 'PageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/match-result', 'PageController@matchResult')->name('match.result');
Route::get('/match-schedule', 'PageController@matchSchedule')->name('match.schedule');

Route::redirect('/admin', '/admin/dashboard', 301);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('dashboard', ['uses' => 'AdminController@index', 'as' => 'admin.index']);
    Route::resource('team', 'TeamController');
    ROute::post('get-team', 'TeamController@getTeamAjax');
    Route::resource('match', 'MatchController');
    Route::post('add-winner', 'WinnerController@addWinner');
    Route::match(['get', 'post'], 'calculate-score', 'WinnerPredictionController@calculateScore')->name('admin.calculate.score');
    Route::post('calculate-user-score', 'UserScoreController@calculateUserScore')->name('admin.calculate.user.score');
    Route::get('get-match-time', ['uses' => 'MatchController@getMatchTime', 'as' => 'admin.match.time']);
    Route::get('get-match-location', ['uses' => 'MatchController@getMatchLocation', 'as' => 'admin.match.location']);
});

Route::post('add-prediction', 'WinnerPredictionController@addPrediction')->middleware('auth');
Route::get('my-prediction', 'PageController@myPrediction')->middleware('auth')->name('user.prediction');
