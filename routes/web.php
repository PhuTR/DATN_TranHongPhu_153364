<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Auth'], function(){
    Route::get('dang-ky.html','RegisterController@index')->name('get.register');
    Route::post('dang-ky.html','RegisterController@register')->name('get.register');

    Route::get('dang-nhap.html','LoginController@index')->name('get.login');
    Route::post('dang-nhap.html','LoginController@login')->name('get.login');
    
    Route::get('dang-xuat.html','LoginController@logout')->name('get.logout');

    Route::get('quen-mat-khau','ForgotPasswordController@index')->name('get.forgotpassword');
    Route::post('quen-mat-khau','ForgotPasswordController@forgotpassword')->name('get.forgotpassword');

    Route::get('ma-xac-thuc','ForgotPasswordController@codevalidation')->name('get.codevalidation');
    Route::post('ma-xac-thuc','ForgotPasswordController@codevalidationpost')->name('get.codevalidation');

    Route::get('mat-khau-moi/{user}/{token}','ForgotPasswordController@newpassword')->name('get.newpassword');
    Route::post('mat-khau-moi/{user}/{token}','ForgotPasswordController@newpasswordpost')->name('get.newpassword');

    //login google
    Route::get('auth/google', 'LoginGoogleController@redirectToGoogle')->name('get.login.google');
    Route::get('auth/google/callback', 'LoginGoogleController@handleGoogleCallback');

    //login facebook
    Route::get('auth/facebook', 'LoginFacebookController@redirectToFacebook')->name('get.login.facebook');
    Route::get('auth/facebook/callback', 'LoginFacebookController@handleFacebookCallback');
 

});

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('','HomeController@index')->name('get.home');

    Route::get('xem-tat-ca.html','HomeController@allview')->name('get.home.allview');


    Route::get('{slug}-{id}','CategoryController@index')->name('get.category.item')
    ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::get('{slug}-{id}.html','CategoryController@detail_rooms')->name('get.category.detail')
    ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::get('tim-kiem', 'SearchRoomController@index')->name('get.room.search');

    Route::get('blog.html', 'ArticlesController@index')->name('get.articles.index');
    Route::get('{slug}/{id}.html', 'ArticlesController@detail')->name('get.articles.detail')
    ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::get('bang-gia-đich-vu', 'PriceListController@index')->name('get.pricelist.index');

    Route::get('tinh-thanh-pho/{slug}-{id}', 'LocationController@getRoomByCity')
    ->name('get.room.by_city')
    ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::get('quan-huyen/{id}', 'LocationController@getRoomByDistrict')
    ->name('get.room.by_districts');

    Route::get('phuong-xa/{id}', 'LocationController@getRoomByWards')
        ->name('get.room.by_wards');
      

//location category
    Route::get('tinh-thanh/{id}-{category_id}', 'LocationController@getRoomByCityCategory')
        ->name('get.room.by_city_category');
        
    Route::get('quan/{id}-{category_id}', 'LocationController@getRoomByDistrictCategory')
        ->name('get.room.by_districts_category');
    Route::get('phuong/{id}-{category_id}', 'LocationController@getRoomByWardsCategory')
        ->name('get.room.by_wards_category');
//favourite
    Route::get('tin-da-luu.html','FavouriteController@index')->name('get.home.favourite');
    Route::get('/add-favourite/{id}','FavouriteController@addfavorites')->name('get.home.addfavourite');
    Route::get('/delete-item-favourite/{id}','FavouriteController@deletefavorites')->name('get.home.deletefavourite');
//contact
    Route::get('contact','UserContactController@index')->name('get_user.contact');
    Route::post('contact','UserContactController@store');

//mail
    // Route::get('test-email','HomeController@testEmail');
//lock account
    Route::get('khong-the-truy-cap-trang-nay.html','HomeController@lockaccount')->name('get.home.lockaccount');
//modal room
    Route::post('/view-room','HomeController@viewroom')->name('get.viewroom');
});




@include 'route_user.php';
@include 'route_admin.php';
