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
    return view('content.home');
});

Route::get('/home', function () {
    return view('content.home');
});

Route::get('/contact', function () {
    return view('content.contact');
});

Route::get('/schedule', function () {
    return view('content.schedule');
});

Route::get('/tournaments', function () {
    return view('content.tournaments');
});

Route::get('/tournaments/get', 'TournamentController@getTournament');
Route::post('/tournaments/add', 'TournamentController@addTournament');
Route::post('/tournaments/edit/{id}', 'TournamentController@editTournament');
Route::delete('/tournaments/delete/{id}', 'TournamentController@deleteTournament');

Route::get('/program/adult', function () {
    return view('content.adult_program');
});

Route::get('/program/junior', function () {
    return view('content.junior_program');
});

Route::get('/belt-ranks/adult', function () {
    return view('content.adult_belt_ranks');
});

Route::get('/belt-ranks/junior', function () {
    return view('content.junior_belt_ranks');
});

Route::get('/rates/adult', function () {
    return view('content.adult_rates');
});

Route::get('/rates/junior', function () {
    return view('content.junior_rates');
});

Route::get('/faq/adult', 'FAQController@getAdultFAQ');
Route::get('/faq/junior', 'FAQController@getJuniorFAQ');
Route::post('/faq/add', 'FAQController@addFAQ');
Route::post('/faq/edit/{id}', 'FAQController@editFAQ');
Route::delete('/faq/delete/{id}', 'FAQController@deleteFAQ');

Route::get('/about', function () {
    return view('content.about');
});

Route::get('/team', function () {
    return view('content.team');
});

Route::get('/policies', function () {
    return view('content.policies');
});

Route::get('/university', function () {
    return view('content.university');
});

Route::get('/outreach', function () {
    return view('content.outreach');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

