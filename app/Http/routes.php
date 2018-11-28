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

// ตั้งค่า session ภาษา เริ่มต้น
if(session('lang') == ''){
    Session::set('lang', 'th');
}

// เปลี่ยนภาษา
Route::get('change/{locale}', function ($locale) {
    Session::set('locale', $locale); // กำหนดค่าตัวแปรแบบ locale session ให้มีค่าเท่ากับตัวแปรที่ส่งเข้ามา 
    session(['lang' => $locale]);
	return Redirect::back(); // สั่งให้โหลดหน้าเดิม
});

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
// Route::get('search', 'HomeController@search');

Route::get('/page', 'PageController@getIndex');
Route::get('/page/{param}', 'PageController@getView');

Route::get('/info', 'InfoController@getIndex');
Route::get('/info/type/{param}', 'InfoController@getType');
Route::get('/info/{param}', 'InfoController@getView');

Route::controller('download', 'DownloadController');

Route::get('/gallery', 'GalleryController@getIndex');
Route::get('/gallery/{param}', 'GalleryController@getView');

Route::get('/video', 'VideoController@getIndex');
Route::get('/video/{param}', 'VideoController@getView');

Route::get('/announce', 'AnnounceController@getIndex');
Route::get('/announce/type/{param}', 'AnnounceController@getType');
Route::get('/announce/{param}', 'AnnounceController@getView');

Route::get('/manager', 'ManagerController@getIndex');
Route::get('/manager/type/{param}', 'ManagerController@getType');
Route::get('/manager/{param}', 'ManagerController@getView');

Route::controller('membership', 'MembershipController');

Route::get('/contact', 'ContactController@getIndex');
Route::get('/contact/{param}', 'ContactController@getView');

Route::get('admin', function () {
    return redirect('fdadmin/info');
});
Route::get('fdadmin', function () {
    return redirect('fdadmin/info');
});

// เช็กล็อกอิน
Route::group(['middleware' => 'auth'], function () {

    // FDadmin
    Route::group(['prefix' => 'fdadmin', 'namespace' => 'Fdadmin'], function () {
        Route::controller('ajax', 'AjaxController');
        Route::controller('dashboard', 'DashboardController');
        Route::controller('hilight', 'HilightController');
        Route::controller('page', 'PageController');
        Route::controller('info', 'InfoController');
        Route::controller('announce', 'AnnounceController');
        Route::controller('law', 'LawController');
        Route::controller('download', 'DownloadController');
        Route::controller('manager', 'ManagerController');
        Route::controller('gallery', 'GalleryController');
        Route::controller('membership', 'MembershipController');
        Route::controller('contact', 'ContactController');
        Route::controller('video', 'VideoController');
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