<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin', 'prefix' => 'admin',], function(){
    
    Route::get('dang-ky.html','RegisterAdminController@index')->name('get_admin.register');
    Route::post('dang-ky.html','RegisterAdminController@register')->name('get_admin.register_post');

    Route::get('','LoginAdminController@index')->name('get_admin.login');
    Route::post('','LoginAdminController@login')->name('get_admin.login_post');
    
    Route::get('dang-xuat.html','LoginAdminController@logout')->name('get_admin.logout');

    Route::get('home','AdminDashboardController@index')->name('get_admin.admin.dashbord')->middleware('role:SupperAdmin');
    Route::post('filter-by-date','AdminDashboardController@filter_by_date');

    Route::post('days-order','AdminDashboardController@days_order');

    Route::post('dashboard-filter','AdminDashboardController@dashboard_filter');


    Route::get('cap-nhat.html','AdminProfileController@index')->name('get_admin.profile.index');
    Route::post('cap-nhat.html','AdminProfileController@update')->name('get_admin.profile.edit');

    Route::get('doi-mat-khau.html','AdminProfileController@updatePassword')->name('get_admin.profile.update_password');
    Route::post('doi-mat-khau.html','AdminProfileController@changeUpdate');

    Route::get('cap-nhat-so-dien-thoai.html','AdminProfileController@updatePhone')->name('get_admin.profile.update_phone');
    Route::post('cap-nhat-so-dien-thoai.html','AdminProfileController@processUpdate');

    Route::get('khong-co-quyen-truy-cap.html','AdminDashboardController@inaccessible')->name('get_admin.inaccessible');

    Route::group(['prefix' => 'location','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminLocationController@index')->name('get_admin.location.home');

        Route::get('create','AdminLocationController@create')->name('get_admin.location.create');
        Route::post('create','AdminLocationController@store')->name('get_admin.location.create_post');

        Route::get('update/{id}','AdminLocationController@edit')->name('get_admin.location.update');
        Route::post('update/{id}','AdminLocationController@update')->name('get_admin.location.edit_location');

        Route::get('Delete/{id}','AdminLocationController@delete')->name('get_admin.location.delete');

    });


    Route::group(['prefix' => 'category','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminCategoryController@index')->name('get_admin.category.index');

        Route::get('create','AdminCategoryController@create')->name('get_admin.category.create');
        Route::post('create','AdminCategoryController@store')->name('get_admin.category.create_post');

        Route::get('update/{id}','AdminCategoryController@edit')->name('get_admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update')->name('get_admin.category.edit_category');

        Route::get('Delete/{id}','AdminCategoryController@delete')->name('get_admin.category.delete');

    });


    Route::group(['prefix' => 'room','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminRoomController@index')->name('get_admin.room.index');

        Route::get('success/{id}', 'AdminRoomController@success')->name('get_admin.room.success');

        Route::get('expires/{id}', 'AdminRoomController@expires')->name('get_admin.room.expires');

        Route::get('hide/{id}', 'AdminRoomController@hide')->name('get_admin.room.hide');

        Route::get('cancel/{id}', 'AdminRoomController@cancel')->name('get_admin.room.cancel');
        Route::post('cancel/{id}', 'AdminRoomController@processCancelRoom');

        Route::get('delete/{id}', 'AdminRoomController@delete')->name('get_admin.room.delete');


    });


   
    Route::group(['prefix' => 'user','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminUserController@index')->name('get_admin.user.index');

        Route::get('delete/{id}', 'AdminUserController@delete')->name('get_admin.user.delete');

        Route::get('lock/{id}', 'AdminUserController@lockuser')->name('get_admin.user.lock');

        Route::get('unlock/{id}', 'AdminUserController@unlockuser')->name('get_admin.user.unlock');

        Route::get('user-detail/{id}', 'AdminUserController@userdetail')->name('get_admin.user.detail');

    });


    Route::group(['prefix' => 'pay','middleware'=>['role:SupperAdmin']],function(){
        Route::get('depposit-history','AdminPayController@deposit_history')->name('get_admin.pay.deposit_history');
        Route::get('payment-history','AdminPayController@payment_history')->name('get_admin.pay.paymet_history');

        Route::get('create-transaction.html', 'AdminPayController@create_transaction')->name('get_admin.pay.create_transaction');
        Route::post('create-transaction.html', 'AdminPayController@store_transaction');

        Route::get('update-transaction/{id}', 'AdminPayController@edit_transaction')->name('get_admin.pay.update_transaction');
        Route::post('update-transaction/{id}', 'AdminPayController@update_transaction');


    });

    Route::group(['prefix' => 'article','middleware'=>['role:SupperAdmin|CTV|CTV bài viết']],function(){

        Route::get('','AdminArticlesController@index')->name('get_admin.article.index');

        Route::get('create','AdminArticlesController@create')->name('get_admin.article.create');
        Route::post('create','AdminArticlesController@store');

        Route::get('update/{id}','AdminArticlesController@edit')->name('get_admin.article.edit');
        Route::post('update/{id}','AdminArticlesController@update');

        Route::get('delete/{id}', 'AdminArticlesController@delete')->name('get_admin.article.delete');


    });

    Route::group(['prefix' => 'contact','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminContactController@index')->name('get_admin.contact.index');
        Route::get('delete/{id}', 'AdminContactController@delete')->name('get_admin.contact.delete');

    });
   
    Route::group(['prefix' => 'permission','middleware'=>['role:SupperAdmin|Thêm permission']],function(){

        Route::get('','AdminPermissionController@index')->name('get_admin.permission.index');

        Route::get('create','AdminPermissionController@create')->name('get_admin.permission.create');
        Route::post('create','AdminPermissionController@store');

        Route::get('update/{id}','AdminPermissionController@edit')->name('get_admin.permission.update');
        Route::post('update/{id}','AdminPermissionController@update');

        Route::get('delete/{id}', 'AdminPermissionController@delete')->name('get_admin.permission.delete');

    });

    Route::group(['prefix' => 'role','middleware'=>['role:SupperAdmin|Thêm permission']],function(){

        Route::get('','AdminRoleController@index')->name('get_admin.role.index');

        Route::get('create','AdminRoleController@create')->name('get_admin.role.create');
        Route::post('create','AdminRoleController@store');

        Route::get('update/{id}','AdminRoleController@edit')->name('get_admin.role.update');
        Route::post('update/{id}','AdminRoleController@update');

        Route::get('delete/{id}', 'AdminRoleController@delete')->name('get_admin.role.delete');

    });

    Route::group(['prefix' => 'account','middleware'=>['role:SupperAdmin|CTV']],function(){

        Route::get('','AdminAccountController@index')->name('get_admin.account.index');

        Route::get('create','AdminAccountController@create')->name('get_admin.account.create');
        Route::post('create','AdminAccountController@store');

        Route::get('update/{id}','AdminAccountController@edit')->name('get_admin.account.update');
        Route::post('update/{id}','AdminAccountController@update');

        Route::get('delete/{id}', 'AdminAccountController@delete')->name('get_admin.account.delete');

    });

});
