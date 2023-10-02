<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
    Route::get('cap-nhat.html','UserProfileController@index')->name('get_user.profile.index');
    Route::post('cap-nhat.html','UserProfileController@update')->name('get_user.profile.edit');

    Route::get('cap-nhat-so-dien-thoai.html','UserProfileController@updatePhone')->name('get_user.profile.update_phone');
    Route::post('cap-nhat-so-dien-thoai.html','UserProfileController@processUpdate');

    

    Route::get('doi-mat-khau.html','UserProfileController@updatePassword')->name('get_user.profile.update_password');
    Route::post('doi-mat-khau.html','UserProfileController@changeUpdate');

    Route::post('send-code','UserProfileController@sendcode')->name('post_user.send_code');


    // Route::get('/resend-otp','UserProfileController@sendcode')->name('resendOtp');

    
    Route::group(['prefix' => 'room'],function(){
        Route::get('','UserRoomController@index')->name('get_user.room.home');


        Route::get('create','UserRoomController@create')->name('get_user.room.create');
        Route::post('create','UserRoomController@store')->name('get_user.room.create_post');

        Route::get('update/{id}','UserRoomController@edit')->name('get_user.room.update');
        Route::post('update/{id}','UserRoomController@update')->name('get_user.room.edit_room');

        Route::get('district','UserRoomController@loadDistrict')->name('get_user.load.district');
        Route::get('wards','UserRoomController@loadWards')->name('get_user.load.wards');

        Route::get('pay/{id}', 'UserRoomController@payRoom')->name('get_user.room.pay');
        Route::post('pay/{id}', 'UserRoomController@savePayRoom');

    });


    Route::get('contact','UserContactController@index')->name('get_user.contact');

    Route::group(['prefix' => 'pay'],function(){
        Route::get('pay','UserPayController@index_pay')->name('get_user.pay.index_pay');
        Route::get('depposit-history','UserPayController@deposit_history')->name('get_user.pay.deposit_history');
        Route::get('payment-history','UserPayController@payment_history')->name('get_user.pay.paymet_history');

        Route::get('chuyen-khoan.html','UserPayController@transfer_money')->name('get_user.pay.transfer_money');
        Route::get('atm-internet-banking.html','UserPayController@atm')->name('get_user.pay.atm');
        Route::get('tien-mat.html','UserPayController@cash')->name('get_user.pay.cash');
        Route::get('zalo-pay.html','UserPayController@zalopay')->name('get_user.pay.zalo_pay');

 


    });

   


});
