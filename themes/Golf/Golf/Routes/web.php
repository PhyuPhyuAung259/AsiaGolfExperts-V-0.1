<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>env('GOLF_ROUTE_PREFIX','golf')],function(){
    Route::get('/','GolfController@index')->name('golf.search'); // Search
    Route::get('/{slug}','GolfController@detail')->name('golf.detail');// Detail
});

Route::group(['prefix'=>'user/'.env('GOLF_ROUTE_PREFIX','golf'),'middleware' => ['auth','verified']],function(){
    Route::get('/','VendorGolfController@index')->name('golf.vendor.index');
    Route::get('/create','VendorGolfController@create')->name('golf.vendor.create');
    Route::get('/edit/{id}','VendorGolfController@edit')->name('golf.vendor.edit');
    Route::get('/del/{id}','VendorGolfController@delete')->name('golf.vendor.delete');
    Route::post('/store/{id}','VendorGolfController@store')->name('golf.vendor.store');
    Route::get('bulkEdit/{id}','VendorGolfController@bulkEdit')->name("golf.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','VendorGolfController@bookingReportBulkEdit')->name("golf.vendor.booking_report.bulk_edit");
    Route::get('/recovery','VendorGolfController@recovery')->name('golf.vendor.recovery');
    Route::get('/restore/{id}','VendorGolfController@restore')->name('golf.vendor.restore');
});

Route::group(['prefix'=>'user/'.env('GOLF_ROUTE_PREFIX','golf')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('golf.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('golf.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('golf.vendor.availability.store');
    });
});
