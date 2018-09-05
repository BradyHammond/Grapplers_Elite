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

Route::get('/', 'HomeController@getHome');
Route::get('/home', 'HomeController@getHome');
Route::post('/home/add', 'HomeController@addCard');
Route::post('/home/edit/{id}', 'HomeController@editCard');
Route::delete('/home/delete/{id}', 'HomeController@deleteCard');

Route::get('/contact', function () {
    return view('content.contact');
});
Route::post('/contact', 'ContactController@sendMail');

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

Route::get('/program/adult', 'ProgramController@getAdultProgram');
Route::get('/program/junior', 'ProgramController@getJuniorProgram');
Route::post('/program/add', 'ProgramController@addProgram');
Route::post('/program/edit/{id}', 'ProgramController@editProgram');
Route::delete('/program/delete/{id}', 'ProgramController@deleteProgram');

Route::get('/belt-ranks/adult', 'BeltsController@getAdultBelts');
Route::get('/belt-ranks/junior', 'BeltsController@getJuniorBelts');
Route::post('/belt-ranks/add', 'BeltsController@addBelt');
Route::post('/belt-ranks/edit/{id}', 'BeltsController@editBelt');
Route::delete('/belt-ranks/delete/{id}', 'BeltsController@deleteBelt');

Route::get('/rates/adult', 'RatesController@getAdultRates');
Route::get('/rates/junior', 'RatesController@getJuniorRates');
Route::post('/rates/edit/{id}', 'RatesController@editRates');

Route::get('/faq/adult', 'FAQController@getAdultFAQ');
Route::get('/faq/junior', 'FAQController@getJuniorFAQ');
Route::post('/faq/add', 'FAQController@addFAQ');
Route::post('/faq/edit/{id}', 'FAQController@editFAQ');
Route::delete('/faq/delete/{id}', 'FAQController@deleteFAQ');

Route::get('/about', 'AboutController@getAbout');
Route::post('/about/edit/{id}', 'AboutController@editAbout');

Route::get('/team', 'TeamController@getTeam');
Route::post('/team/add', 'TeamController@addTeamMember');
Route::post('/team/edit/{id}', 'TeamController@editTeamMember');
Route::delete('/team/delete/{id}', 'TeamController@deleteTeamMember');

Route::get('/policies', 'PolicyController@getPolicy');
Route::post('/policies/add', 'PolicyController@addPolicy');
Route::post('/policies/edit/{id}', 'PolicyController@editPolicy');
Route::delete('/policies/delete/{id}', 'PolicyController@deletePolicy');

Route::get('/university', 'UniversityController@getUniversity');
Route::post('/university/add', 'UniversityController@addUniversity');
Route::post('/university/edit/{id}', 'UniversityController@editUniversity');
Route::delete('/university/delete/{id}', 'UniversityController@deleteUniversity');

Route::get('/outreach', 'OutreachController@getOutreach');
Route::post('/outreach/edit/{id}', 'OutreachController@editOutreach');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

