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

// Route::get('/', function () {
    // return view('welcome');
// });

// Route::controller('sticker', 'StickerController');
// Route::controller('theme', 'ThemeController');

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
// Route::get('search', 'HomeController@search');

Route::get('/page', 'PageController@getIndex');
Route::get('/page/{param}', 'PageController@getView');

Route::get('/info', 'InfoController@getIndex');
Route::get('/info/type/{param}', 'InfoController@getType');
Route::get('/info/{param}', 'InfoController@getView');

Route::get('/download', 'DownloadController@getIndex');

Route::get('/gallery', 'GalleryController@getIndex');
Route::get('/gallery/{param}', 'GalleryController@getView');

Route::get('/announce', 'AnnounceController@getIndex');
Route::get('/announce/type/{param}', 'AnnounceController@getType');
Route::get('/announce/{param}', 'AnnounceController@getView');

Route::get('/manager', 'ManagerController@getIndex');
Route::get('/manager/type/{param}', 'ManagerController@getType');
Route::get('/manager/{param}', 'ManagerController@getView');

Route::controller('membership', 'MembershipController');

// เช็กล็อกอิน
Route::group(['middleware' => 'auth'], function () {

    // FDadmin
    Route::group(['prefix' => 'fdadmin', 'namespace' => 'Fdadmin'], function () {
        Route::controller('dashboard', 'DashboardController');
        Route::controller('page', 'PageController');
        Route::controller('info', 'InfoController');
        Route::controller('announce', 'AnnounceController');
        Route::controller('law', 'LawController');
        Route::controller('download', 'DownloadController');
        Route::controller('manager', 'ManagerController');
        Route::controller('gallery', 'GalleryController');
        Route::controller('membership', 'MembershipController');
    });

}); //middleware

Route::get('logout', function() {
    Auth::logout();
    return redirect()->intended('/');
});

// Route::get('/test', function () {
//     $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
//     $crawler->filter('.result__title .result__a')->each(function ($node) {
//         dump($node->text());
//     });
//     return view('welcome');
// });

// Route::get('/testimg', function () {
//     // return Image::canvas(800, 600, '#ccc')->save('bar.jpg');
//     return Image::canvas(800, 600, '#ccc')->response('jpg');
// });

// // test entrust
// Route::controller('role', 'RoleController');