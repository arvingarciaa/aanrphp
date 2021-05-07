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
Route::post('manage/updateHeaderLogo', ['uses' => 'LandingPageElementsController@updateHeaderLogo', 'as' => 'landing.updateHeaderLogo']);
Route::post('manage/updateLandingPageItems', ['uses' => 'LandingPageElementsController@updateLandingPageItems', 'as' => 'pages.updateLandingPageItems']);
Route::post('manage/updateLandingPageViews', ['uses' => 'LandingPageElementsController@updateLandingPageViews', 'as' => 'pages.updateLandingPageViews']);

//Pages Controller
Route::get('aanr-industry-profile/{id}', 'PagesController@industryProfileView')->name('industryProfileView');
Route::get('about', 'PagesController@aboutUs')->name('aboutUs');
Route::get('search', 'PagesController@search')->name('search');

//Dashboard
Route::get('dashboard/manage', 'PagesController@dashboardManage')->name('dashboardManage');

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

//ConsortiaMember
Route::post('headlines/addConsortiaMember', 'ConsortiaMembersController@addConsortiaMember')->name('addConsortiaMember');
Route::post('headlines/{id}/editConsortiaMember', 'ConsortiaMembersController@editConsortiaMember')->name('editConsortiaMember');
Route::delete('headlines/{id}/deleteConsortiaMember', 'ConsortiaMembersController@deleteConsortiaMember')->name('deleteConsortiaMember');

//Industries
Route::post('manage/addIndustry', 'IndustriesController@addIndustry')->name('addIndustry');
Route::post('manage/{id}/editIndustry', 'IndustriesController@editIndustry')->name('editIndustry');
Route::delete('manage/{id}/deleteIndustry', 'IndustriesController@deleteIndustry')->name('deleteIndustry');

//Advertisements
Route::post('headlines/addAdvertisement', 'AdvertisementsController@addAdvertisement')->name('addAdvertisement');
Route::post('headlines/{id}/editAdvertisement', 'AdvertisementsController@editAdvertisement')->name('editAdvertisement');
Route::delete('headlines/{id}/deleteAdvertisement', 'AdvertisementsController@deleteAdvertisement')->name('deleteAdvertisement');

//Agendas
Route::post('headlines/addAgenda', 'AgendasController@addAgenda')->name('addAgenda');
Route::post('headlines/{id}/editAgenda', 'AgendasController@editAgenda')->name('editAgenda');
Route::delete('headlines/{id}/deleteAgenda', 'AgendasController@deleteAgenda')->name('deleteAgenda');

//Announcements
Route::post('headlines/addAnnouncement', 'AnnouncementsController@addAnnouncement')->name('addAnnouncement');
Route::post('headlines/{id}/editAnnouncement', 'AnnouncementsController@editAnnouncement')->name('editAnnouncement');
Route::delete('headlines/{id}/deleteAnnouncement', 'AnnouncementsController@deleteAnnouncement')->name('deleteAnnouncement');

//ArtifactAANR
Route::post('headlines/addArtifactAANR', 'ArtifactAANRController@addArtifactAANR')->name('addArtifactAANR');
Route::post('headlines/{id}/editArtifactAANR', 'ArtifactAANRController@editArtifactAANR')->name('editArtifactAANR');
Route::delete('headlines/{id}/deleteArtifactAANR', 'ArtifactAANRController@deleteArtifactAANR')->name('deleteArtifactAANR');

//Content
Route::post('headlines/addContent', 'ContentController@addContent')->name('addContent');
Route::post('headlines/{id}/editContent', 'ContentController@editContent')->name('editContent');
Route::delete('headlines/{id}/deleteContent', 'ContentController@deleteContent')->name('deleteContent');

//ContentSubtype
Route::post('headlines/addContentSubtype', 'ContentSubtypesController@addContentSubtype')->name('addContentSubtype');
Route::post('headlines/{id}/editContentSubtype', 'ContentSubtypesController@editContentSubtype')->name('editContentSubtype');
Route::delete('headlines/{id}/deleteContentSubtype', 'ContentSubtypesController@deleteContentSubtype')->name('deleteContentSubtype');

//Contributors
Route::post('headlines/addContributor', 'ContributorsController@addContributor')->name('addContributor');
Route::post('headlines/{id}/editContributor', 'ContributorsController@editContributor')->name('editContributor');
Route::delete('headlines/{id}/deleteContributor', 'ContributorsController@deleteContributor')->name('deleteContributor');

//ISP
Route::post('headlines/addISP', 'ISPController@addISP')->name('addISP');
Route::post('headlines/{id}/editISP', 'ISPController@editISP')->name('editISP');
Route::delete('headlines/{id}/deleteISP', 'ISPController@deleteISP')->name('deleteISP');

//Sectors
Route::post('headlines/addSector', 'SectorsController@addSector')->name('addSector');
Route::post('headlines/{id}/editSector', 'SectorsController@editSector')->name('editSector');
Route::delete('headlines/{id}/deleteSector', 'SectorsController@deleteSector')->name('deleteSector');

//Commodity
Route::post('headlines/addCommodity', 'CommoditiesController@addCommodity')->name('addCommodity');
Route::post('headlines/{id}/editCommodity', 'CommoditiesController@editCommodity')->name('editCommodity');
Route::delete('headlines/{id}/deleteCommodity', 'CommoditiesController@deleteCommodity')->name('deleteCommodity');

//Subscriber
Route::post('headlines/addSubscriber', 'SubscriberController@addSubscriber')->name('addSubscriber');
Route::post('headlines/{id}/editSubscriber', 'SubscriberController@editSubscriber')->name('editSubscriber');
Route::delete('headlines/{id}/deleteSubscriber', 'SubscriberController@deleteSubscriber')->name('deleteSubscriber');