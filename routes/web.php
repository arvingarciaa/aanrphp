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
Route::post('manage/updateLandingPageViews', ['uses' => 'LandingPageElementsController@updateLandingPageViews', 'as' => 'l.updateLandingPageViews']);
Route::post('manage/editIndustryProfileSection', 'LandingPageElementsController@editIndustryProfileSection')->name('editIndustryProfileSection');
Route::post('manage/editLatestAANRSection', 'LandingPageElementsController@editLatestAANRSection')->name('editLatestAANRSection');
Route::post('manage/editUserTypeRecommendationSection', 'LandingPageElementsController@editUserTypeRecommendationSection')->name('editUserTypeRecommendationSection');
Route::post('manage/editFeaturedPublicationsSection', 'LandingPageElementsController@editFeaturedPublicationsSection')->name('editFeaturedPublicationsSection');
Route::post('manage/editFeaturedVideosSection', 'LandingPageElementsController@editFeaturedVideosSection')->name('editFeaturedVideosSection');
Route::post('manage/editRecommendedForYouSection', 'LandingPageElementsController@editRecommendedForYouSection')->name('editRecommendedForYouSection');
Route::post('manage/editConsortiaMembersSection', 'LandingPageElementsController@editConsortiaMembersSection')->name('editConsortiaMembersSection');
Route::post('manage/editAgrisyunaryoSearchBanner', 'LandingPageElementsController@editAgrisyunaryoSearchBanner')->name('editAgrisyunaryoSearchBanner');
Route::post('manage/editIndustryProfile', 'LandingPageElementsController@editIndustryProfile')->name('editIndustryProfile');


//Pages Controller
Route::get('/', 'PagesController@getLandingPage')->name('getLandingPage');
Route::get('aanr-industry-profile', 'PagesController@industryProfileView')->name('industryProfileView');
Route::get('about', 'PagesController@aboutUs')->name('aboutUs');
Route::get('usefulLinks', 'PagesController@usefulLinks')->name('usefulLinks');
Route::get('search', 'PagesController@search')->name('search');
Route::get('consortia/about', 'PagesController@consortiaAboutPage')->name('consortiaAboutPage');
Route::get('consortia/landing', 'PagesController@consortiaLandingPage')->name('consortiaLandingPage');
Route::get('unit/about', 'PagesController@unitAboutPage')->name('unitAboutPage');
Route::get('aanr/about', 'PagesController@AANRAboutPage')->name('AANRAboutPage');
Route::get('pcaarrd/about', 'PagesController@PCAARRDAboutPage')->name('PCAARRDAboutPage');
Route::get('agrisyunaryo', 'PagesController@agrisyunaryo')->name('agrisyunaryo');
Route::get('analytics/search', 'PagesController@searchAnalytics')->name('searchAnalytics');
Route::get('analytics/search/save', 'PagesController@saveAnalytics')->name('saveAnalytics');

//Social Media
Route::post('headlines/addSocial', 'SocialMediaStickyController@addSocial')->name('addSocial');
Route::post('headlines/{id}/editSocial', 'SocialMediaStickyController@editSocial')->name('editSocial');

//Header Links
Route::post('headlines/{id}/editHeaderLink', 'HeaderLinksController@editHeaderLink')->name('editHeaderLink');
Route::post('headlines/addHeaderLink', 'HeaderLinksController@addHeaderLink')->name('addHeaderLink');
Route::post('headlines/{id}/deleteHeaderLink', 'HeaderLinksController@deleteHeaderLink')->name('deleteHeaderLink');

//AANR Page
Route::post('headlines/{id}/editAANRPage', 'AANRPageController@editAANRPage')->name('editAANRPage');
Route::post('headlines/{id}/editAANRPageBanner', 'AANRPageController@editAANRPageBanner')->name('editAANRPageBanner');
Route::post('headlines/{id}/editAANRPageDetails', 'AANRPageController@editAANRPageDetails')->name('editAANRPageDetails');

//PCAARRD Page
Route::post('headlines/{id}/editPCAARRDPage', 'PCAARRDPageController@editPCAARRDPage')->name('editPCAARRDPage');
Route::post('headlines/{id}/editPCAARRDPageBanner', 'PCAARRDPageController@editPCAARRDPageBanner')->name('editPCAARRDPageBanner');
Route::post('headlines/{id}/editPCAARRDPageDetails', 'PCAARRDPageController@editPCAARRDPageDetails')->name('editPCAARRDPageDetails');

//Dashboard
Route::get('dashboard/manage', 'PagesController@dashboardManage')->name('dashboardManage');
Route::get('dashboard/userDashboard', 'PagesController@userDashboard')->name('userDashboard');

//Headlines
Route::post('headlines/addHeadline', 'HeadlinesController@addHeadline')->name('addHeadline');
Route::post('headlines/{id}/editHeadline', 'HeadlinesController@editHeadline')->name('editHeadline');
Route::delete('headlines/{id}/deleteHeadline', 'HeadlinesController@deleteHeadline')->name('deleteHeadline');

//Agrisyunaryo
Route::get('agrisyunaryo/search', 'PagesController@agrisyunaryoSearch')->name('agrisyunaryoSearch');
Route::post('headlines/addAgrisyunaryo', 'AgrisyunaryosController@addAgrisyunaryo')->name('addAgrisyunaryo');
Route::post('headlines/{id}/editAgrisyunaryo', 'AgrisyunaryosController@editAgrisyunaryo')->name('editAgrisyunaryo');
Route::delete('headlines/deleteAgrisyunaryo', 'AgrisyunaryosController@deleteAgrisyunaryo')->name('deleteAgrisyunaryo');

//Slider
Route::post('headlines/addSlider', 'LandingPageSlidersController@addSlider')->name('addSlider');
Route::post('headlines/{id}/editSlider', 'LandingPageSlidersController@editSlider')->name('editSlider');
Route::delete('headlines/{id}/deleteSlider', 'LandingPageSlidersController@deleteSlider')->name('deleteSlider');

//Users
Route::post('signup/createUser', 'UsersController@createUser')->name('createUser');
Route::post('headlines/{id}/editUser', 'UsersController@editUser')->name('editUser');
Route::post('headlines/{id}/deleteUser', 'UsersController@deleteUser')->name('deleteUser');
Route::post('headlines/{id}/sendConsortiaAdminRequest', 'UsersController@sendConsortiaAdminRequest')->name('sendConsortiaAdminRequest');
Route::post('headlines/{id}/consortiaAdminRequestApprove', 'UsersController@consortiaAdminRequestApprove')->name('consortiaAdminRequestApprove');
Route::post('headlines/{id}/consortiaAdminRequestDecline', 'UsersController@consortiaAdminRequestDecline')->name('consortiaAdminRequestDecline');

//Consortia
Route::post('headlines/addConsortia', 'ConsortiaController@addConsortia')->name('addConsortia');
Route::post('headlines/{id}/editConsortia', 'ConsortiaController@editConsortia')->name('editConsortia');
Route::post('headlines/{id}/editConsortiaBanner', 'ConsortiaController@editConsortiaBanner')->name('editConsortiaBanner');
Route::post('headlines/{id}/editConsortiaLandingPageBanner', 'ConsortiaController@editConsortiaLandingPageBanner')->name('editConsortiaLandingPageBanner');
Route::post('headlines/{id}/editConsortiaDetails', 'ConsortiaController@editConsortiaDetails')->name('editConsortiaDetails');
Route::delete('headlines/{id}/deleteConsortia', 'ConsortiaController@deleteConsortia')->name('deleteConsortia');
Route::post('headlines/{id}/setUserAdmin', 'ConsortiaController@setUserAdmin')->name('setUserAdmin');
Route::post('consortia/{id}/editLatestAANRSection', 'ConsortiaController@editConsortiaLatestAANRSection')->name('editConsortiaLatestAANRSection');
Route::post('consortia/{id}/editFeaturedPublicationsSection', 'ConsortiaController@editConsortiaFeaturedPublicationsSection')->name('editConsortiaFeaturedPublicationsSection');
Route::post('consortia/{id}/editFeaturedVideosSection', 'ConsortiaController@editConsortiaFeaturedVideosSection')->name('editConsortiaFeaturedVideosSection');
Route::post('consortia/{id}/editConsortiaMembersSection', 'ConsortiaController@editConsortiaConsortiaMembersSection')->name('editConsortiaConsortiaMembersSection');


//ConsortiaMember
Route::post('headlines/addConsortiaMember', 'ConsortiaMembersController@addConsortiaMember')->name('addConsortiaMember');
Route::post('headlines/{id}/editConsortiaMember', 'ConsortiaMembersController@editConsortiaMember')->name('editConsortiaMember');
Route::delete('headlines/{id}/deleteConsortiaMember', 'ConsortiaMembersController@deleteConsortiaMember')->name('deleteConsortiaMember');
Route::post('headlines/{id}/editConsortiaMemberBanner', 'ConsortiaMembersController@editConsortiaMemberBanner')->name('editConsortiaMemberBanner');
Route::post('headlines/{id}/editConsortiaMemberDetails', 'ConsortiaMembersController@editConsortiaMemberDetails')->name('editConsortiaMemberDetails');

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
Route::post('headlines/addArtifact', 'ArtifactAANRController@addArtifact')->name('addArtifact');
Route::post('headlines/addView', 'ArtifactAANRController@addView')->name('addView');
Route::post('headlines/{id}/editArtifact', 'ArtifactAANRController@editArtifact')->name('editArtifact');
Route::delete('headlines/deleteArtifact', 'ArtifactAANRController@deleteArtifact')->name('deleteArtifact');
Route::post('headlines/uploadPDFArtifact', 'ArtifactAANRController@uploadPDFArtifact')->name('uploadPDFArtifact');
Route::post('dashboard/manage/fetchConsortiaMemberDependent', 'ArtifactAANRController@fetchConsortiaMemberDependent')->name('fetchConsortiaMemberDependent');
Route::post('dashboard/manage/fetchContentSubtypeDependent', 'ArtifactAANRController@fetchContentSubtypeDependent')->name('fetchContentSubtypeDependent');
Route::post('dashboard/manage/fetchCommodityDependent', 'ArtifactAANRController@fetchCommodityDependent')->name('fetchCommodityDependent');
Route::get('dashboard/manage/content/{id}/edit', 'PagesController@contentEdit')->name('contentEdit');
Route::post('headlines/createArtifactViewLog', 'ArtifactAANRViewsController@createArtifactViewLog')->name('createArtifactViewLog');
Route::post('headlines/createISPViewLog', 'ISPViewsController@createISPViewLog')->name('createISPViewLog');
Route::post('headlines/createCommodityViewLog', 'CommodityViewsController@createCommodityViewLog')->name('createCommodityViewLog');

//Content
Route::post('headlines/addContent', 'ContentController@addContent')->name('addContent');
Route::post('headlines/{id}/editContent', 'ContentController@editContent')->name('editContent');
Route::delete('headlines/deleteContent', 'ContentController@deleteContent')->name('deleteContent');

//ContentSubtype
Route::post('headlines/addContentSubtype', 'ContentSubtypesController@addContentSubtype')->name('addContentSubtype');
Route::post('headlines/{id}/editContentSubtype', 'ContentSubtypesController@editContentSubtype')->name('editContentSubtype');
Route::delete('headlines/deleteContentSubtype', 'ContentSubtypesController@deleteContentSubtype')->name('deleteContentSubtype');

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
Route::post('headlines/addSubscriber', 'SubscribersController@addSubscriber')->name('addSubscriber');
Route::post('headlines/{id}/editSubscriber', 'SubscribersController@editSubscriber')->name('editSubscriber');
Route::delete('headlines/{id}/deleteSubscriber', 'SubscribersController@deleteSubscriber')->name('deleteSubscriber');

//Mailing
Route::get('email/subsuccess', 'MailController@subscriptionSuccess')->name('subscriptionSuccess');
Route::get('email/confirm', 'MailController@confirm')->name('confirm');
Route::get('email/digest', 'MailController@digest')->name('digest');
Route::get('email/unsub', 'MailController@unsub')->name('unsub');
Route::get('email/unsubsuccess', 'MailController@unsubsuccess')->name('unsubsuccess');

//API Entry
Route::post('headlines/addAPIEntry', 'APIEntriesController@addAPIEntry')->name('addAPIEntry');
Route::post('headlines/{id}/editAPIEntry', 'APIEntriesController@editAPIEntry')->name('editAPIEntry');
Route::delete('headlines/{id}/deleteAPIEntry', 'APIEntriesController@deleteAPIEntry')->name('deleteAPIEntry');

//CK Editor
Route::post('ckeditor/upload', 'App\Http\Controllers\CKEditorController@store')->name('ckeditor.upload');
