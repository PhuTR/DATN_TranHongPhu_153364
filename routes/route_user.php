<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'User', 'prefix' => 'user','middleware' => 'checkLoginUser'], function(){
    Route::get('cap-nhat.html','UserProfileController@index')->name('get_user.profile.index');
    Route::post('cap-nhat.html','UserProfileController@update')->name('get_user.profile.edit');

    Route::get('cap-nhat-so-dien-thoai.html','UserProfileController@updatePhone')->name('get_user.profile.update_phone');
    Route::post('cap-nhat-so-dien-thoai.html','UserProfileController@processUpdate');

    Route::get('them-so-dien-thoai.html','UserProfileController@createphone')->name('get_user.profile.create_phone');
    Route::post('them-so-dien-thoai.html','UserProfileController@postphone');

    Route::get('doi-mat-khau.html','UserProfileController@updatePassword')->name('get_user.profile.update_password');
    Route::post('doi-mat-khau.html','UserProfileController@changeUpdate');

    Route::post('send-code','UserProfileController@sendcode')->name('post_user.send_code');


    // Route::get('/resend-otp','UserProfileController@sendcode')->name('resendOtp');

    
    Route::group(['prefix' => 'room','middleware' => 'checkUserStatus'],function(){
        Route::get('','UserRoomController@index')->name('get_user.room.home');

        Route::group(['middleware' => 'checkUserPhone'],function(){
            Route::get('create','UserRoomController@create')->name('get_user.room.create');
            Route::post('create','UserRoomController@store')->name('get_user.room.create_post');
            Route::get('update/{id}','UserRoomController@edit')->name('get_user.room.update');
            Route::post('update/{id}','UserRoomController@update')->name('get_user.room.edit_room');
        });
       

        

        Route::get('district','UserRoomController@loadDistrict')->name('get_user.load.district');
        Route::get('wards','UserRoomController@loadWards')->name('get_user.load.wards');

        Route::get('pay/{id}', 'UserRoomController@payRoom')->name('get_user.room.pay');
        Route::post('pay/{id}', 'UserRoomController@savePayRoom');

        Route::get('hide/{id}', 'UserRoomController@hideRoom')->name('get_user.room.hide');
        Route::get('active/{id}', 'UserRoomController@activeRoom')->name('get_user.room.active');

        // Route::get('invoice', 'UserRoomController@invoice')->name('get_user.room.invoice');


    });

    Route::group(['prefix' => 'pay'],function(){
       
        Route::get('depposit-history','UserPayController@deposit_history')->name('get_user.pay.deposit_history');
        Route::get('payment-history','UserPayController@payment_history')->name('get_user.pay.paymet_history');

        Route::get('chuyen-khoan.html','UserPayController@transfer_money')->name('get_user.pay.transfer_money');
       
        Route::get('tien-mat.html','UserPayController@cash')->name('get_user.pay.cash');
        Route::get('zalo-pay.html','UserPayController@zalopay')->name('get_user.pay.zalo_pay');

    });

    Route::group(['prefix' => 'nap-tien'], function () {
        Route::get('','UserPayController@index_pay')->name('get_user.pay.index_pay');
        Route::get('atm-internet-banking', 'UserPayController@atmInternet')->name('get_user.recharge.atm');
        Route::post('atm-internet-banking', 'UserPayController@processAtmInternet');
        Route::get('post-back-atm-internet-banking', 'UserPayController@postbackAtm');
        Route::get('{slug}-{id}', 'UserPayController@switchRecharge')->name('get_user.recharge.switch')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);
    
        Route::get('momo-payment', 'UserPayController@momoPayment')->name('get_user.recharge.momo');
        Route::post('momo-payment', 'UserPayController@processMomo');
        Route::get('post-back-momo', 'UserPayController@postbackMomo');
    });

   


});
