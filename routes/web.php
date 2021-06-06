<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/passwordReset','PasswordResetController@show_password_reset')->name('passwordReset');
Route::post('/passwordReset','PasswordResetController@show_password_reset');
Route::get('/newPassword/{token}','PasswordResetController@password_reset')->middleware('signed')->name('newPassword');
Route::post('/newPassword/{token}','PasswordResetController@password_reset')->middleware('signed');

Route::get('/confirmEmail/{token}','EmailVerifiedController@email_verified')->name('email_verified');

Route::get('/','UserController@show_main')->name('main');
Route::get('/gallery', 'ProductController@index')->name('products');
Route::get('/gallery/product/{id}', 'ProductController@show')->name('product_page');
Route::get('/location', 'LocationController@index')->name('location_page');
Route::get('/prices', 'PriceController@index')->name('prices_page');

Route::get('/authorization','LoginController@show_login')->name('login');
Route::post('/authorization','LoginController@login')->middleware('throttle:5,1');

Route::get('/registration','LoginController@show_register')->name('reg');
Route::post('/registration','LoginController@registration');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile','UserController@show_profile')->name('profile');
    Route::get('/logout','LoginController@logout')->name('logout');
    Route::get('/confirm/{id}','JobController@confirm')->middleware('confirm.job')->name('confirm_job');
    Route::post('/profile/chat/{id}','MessageController@create')->name('create_message')->middleware('check.chat');
    Route::get('/profile/chat/{id}/get','MessageController@get')->name('get_messages')->middleware('check.chat');

    Route::group(['middleware'=>'auth.admin'], function(){
        Route::get('/admin/show/jobs','JobController@show')->name('admin_show_jobs');
        Route::post('/admin/create/job','JobController@admin_create')->name('admin_create_job');
        Route::get('/admin/finish/job/{id}','JobController@finish')->name('admin_finish_job');
        Route::get('/admin/delete/job/{id}','JobController@delete')->name('admin_delete_job');
        Route::get('/admin/update/job/{id}', 'JobController@show_admin_update')->name('admin_update_job_page');
        Route::post('/admin/update/job/{id}', 'JobController@admin_update');

        Route::get('/admin/show/users','UserController@show')->name('admin_show_users');
        Route::post('/admin/create/user','UserController@admin_create')->name('admin_create_user');
        Route::get('/admin/update/user/{id}', 'UserController@show_admin_update')->name('admin_update_user_page');
        Route::post('/admin/update/user/{id}', 'UserController@admin_update');

        Route::get('/admin/show/categories','CategoryController@show')->name('admin_show_categories');
        Route::post('/admin/create/category','CategoryController@create')->name('admin_create_category');
        Route::get('/admin/delete/category/{id}','CategoryController@delete')->name('admin_delete_category');

        Route::get('/admin/show/products','ProductController@admin_show')->name('admin_show_product');
        Route::post('/admin/create/product','ProductController@create')->name('admin_create_product');
        Route::get('/admin/delete/product/{id}','ProductController@delete')->name('admin_delete_product');
        Route::get('/admin/update/product/{id}', 'ProductController@show_admin_update')->name('admin_update_product_page');
        Route::post('/admin/update/product/{id}', 'ProductController@admin_update')->name('admin_update_product');

        Route::post('/admin/update/product/{id}/update/image/{image_id}','ProductImagesController@update')->name('admin_update_product_update_image');
        Route::get('/admin/update/product/{id}/delete/image/{image_id}', 'ProductImagesController@delete')->name('admin_update_product_delete_image');

        Route::get('/admin/chats','ChatController@index')->name('admin_chats');
        Route::get('/admin/tracked/chat/{id}','ChatController@tracked')->middleware('tracked.chat')->name('chat_tracked');
        Route::get('/admin/get/chats','ChatController@get_chats');
        Route::get('/admin/get/tracked_chats','ChatController@get_tracked_chats');

        Route::get('/admin/prices','PriceController@admin_show')->name('admin_prices');
        Route::post('/admin/create/price','PriceController@create_price')->name('admin_create_price');
        Route::get('/admin/delete/price/{id}','PriceController@delete_price')->name('admin_delete_price');

        Route::post('/admin/create/work_type','PriceController@create_work_type')->name('admin_create_work_type');
        Route::get('/admin/delete/work_type/{id}','PriceController@delete_work_type')->name('admin_delete_work_type');

        Route::get('/admin/getOrderTable','TableController@showAdminOrderTable');
        Route::get('/admin/getUserTable','TableController@showAdminUserTable');
        Route::get('/admin/getCategoryTable','TableController@showAdminCategoryTable');
        Route::get('/admin/getProductTable','TableController@showAdminProductTable');
    });

    Route::group(['middleware'=>'auth.worker'], function(){
        Route::post('/worker/create/job','JobController@worker_create')->name('worker_create_job');
        Route::get('/worker/finish/job/{id}','JobController@finish')->name('worker_finish_job');
        Route::get('/worker/update/job/{id}','JobController@show_worker_update')->name('worker_update_job_page');
        Route::post('/worker/update/job/{id}','JobController@worker_update')->name('worker_update_job');
    });
});
