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
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/manage', function () {
    return view('pages.manage');
});


//LandingPageController
Route::post('manage/updateTopBanner', ['uses' => 'LandingPageElementsController@updateTopBanner', 'as' => 'landing.updateTopBanner']);
Route::post('manage/updateConsortiaBanner', ['uses' => 'LandingPageElementsController@updateConsortiaBanner', 'as' => 'landing.updateConsortiaBanner']);

//Headlines
Route::post('headlines/addHeadline', 'HeadlinesController@addHeadline')->name('addHeadline');
Route::post('headlines/{id}/editHeadline', 'HeadlinesController@editHeadline')->name('editHeadline');
Route::delete('headlines/{id}/deleteHeadline', 'HeadlinesController@deleteHeadline')->name('deleteHeadline');

//Slider
Route::post('headlines/addSlider', 'LandingPageSlidersController@addSlider')->name('addSlider');
Route::post('headlines/{id}/editSlider', 'LandingPageSlidersController@editSlider')->name('editSlider');
Route::delete('headlines/{id}/deleteSlider', 'LandingPageSlidersController@deleteSlider')->name('deleteSlider');

//Consortia
Route::post('headlines/addConsortia', 'ConsortiaController@addConsortia')->name('addConsortia');
Route::post('headlines/{id}/editConsortia', 'ConsortiaController@editConsortia')->name('editConsortia');
Route::delete('headlines/{id}/deleteConsortia', 'ConsortiaController@deleteConsortia')->name('deleteConsortia');
