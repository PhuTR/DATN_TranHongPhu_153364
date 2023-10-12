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


});


@include 'route_user.php';
@include 'route_admin.php';
