<?php

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;
Route::group(['prefix'=>'user','middleware' => ['auth','verified']],function(){
    Route::match(['get'],'/dashboard','UserController@dashboard')->name("vendor.dashboard");
    Route::post('/reloadChart','UserController@reloadChart');
    Route::post('/profile_post','UserController@profile_post')->name("user.profile.profile_post");

    Route::get('/showContact', 'UserController@showContact')->name('user.showContact');
    Route::get('/showContactNew', 'UserController@showContactNew')->name('user.showContactNew');

    Route::match(['get'],'/upgrade-vendor','UserController@upgradeVendor')->name("user.upgrade_vendor");
});

//Newsletter
Route::post('newsletter/subscribe','UserController@subscribe')->name('newsletter.subscribe');
