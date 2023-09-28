<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    
    Route::get('dang-ky.html','RegisterAdminController@index')->name('get_admin.register');
    Route::post('dang-ky.html','RegisterAdminController@register')->name('get_admin.register_post');

    Route::get('','LoginAdminController@index')->name('get_admin.login');
    Route::post('','LoginAdminController@login')->name('get_admin.login_post');
    
    Route::get('dang-xuat.html','LoginAdminController@logout')->name('get_admin.logout');


    Route::get('home','AdminDashboardController@index')->name('get_admin.admin.dashbord');

    Route::get('cap-nhat.html','AdminProfileController@index')->name('get_admin.profile.index');
    Route::post('cap-nhat.html','AdminProfileController@update')->name('get_admin.profile.edit');

    Route::get('doi-mat-khau.html','AdminProfileController@updatePassword')->name('get_admin.profile.update_password');
    Route::post('doi-mat-khau.html','AdminProfileController@changeUpdate');


    Route::group(['prefix' => 'location'],function(){

        Route::get('','AdminLocationController@index')->name('get_admin.location.home');

        Route::get('create','AdminLocationController@create')->name('get_admin.location.create');
        Route::post('create','AdminLocationController@store')->name('get_admin.location.create_post');

        Route::get('update/{id}','AdminLocationController@edit')->name('get_admin.location.update');
        Route::post('update/{id}','AdminLocationController@update')->name('get_admin.location.edit_location');

        Route::get('Delete/{id}','AdminLocationController@delete')->name('get_admin.location.delete');

    });


    Route::group(['prefix' => 'category'],function(){

        Route::get('','AdminCategoryController@index')->name('get_admin.category.index');

        Route::get('create','AdminCategoryController@create')->name('get_admin.category.create');
        Route::post('create','AdminCategoryController@store')->name('get_admin.category.create_post');

        Route::get('update/{id}','AdminCategoryController@edit')->name('get_admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update')->name('get_admin.category.edit_category');

        Route::get('Delete/{id}','AdminCategoryController@delete')->name('get_admin.category.delete');

    });


    Route::group(['prefix' => 'room'],function(){

        Route::get('','AdminRoomController@index')->name('get_admin.room.index');

        Route::get('approve/{id}','AdminRoomController@ApproveRoom')->name('get_admin.room.approve');

        Route::get('unapprove/{id}','AdminRoomController@UnApproveRoom')->name('get_admin.room.unapprove');

        Route::get('Delete/{id}','AdminRoomController@delete')->name('get_admin.room.delete');

    });


   
    Route::group(['prefix' => 'user'],function(){

        Route::get('','AdminUserController@index')->name('get_admin.user.index');

    });
   


});
