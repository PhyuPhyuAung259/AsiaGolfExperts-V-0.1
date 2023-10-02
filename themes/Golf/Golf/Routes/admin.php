<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','GolfController@index')->name('golf.admin.index');
Route::get('/create','GolfController@create')->name('golf.admin.create');
Route::get('/edit/{id}','GolfController@edit')->name('golf.admin.edit');
Route::post('/store/{id}','GolfController@store')->name('golf.admin.store');
Route::post('/bulkEdit','GolfController@bulkEdit')->name('golf.admin.bulkEdit');
Route::get('/recovery','GolfController@recovery')->name('golf.admin.recovery');
Route::get('/getForSelect2','GolfController@getForSelect2')->name('golf.admin.getForSelect2');
Route::get('/getForSelect2','GolfController@getForSelect2')->name('golf.admin.getForSelect2');


Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('golf.admin.attribute.index');
    Route::get('edit/{id}','AttributeController@edit')->name('golf.admin.attribute.edit');
    Route::post('store/{id}','AttributeController@store')->name('golf.admin.attribute.store');
    Route::post('/editAttrBulk','AttributeController@editAttrBulk')->name('golf.admin.attribute.editAttrBulk');

    Route::get('terms/{id}','AttributeController@terms')->name('golf.admin.attribute.term.index');
    Route::get('term_edit/{id}','AttributeController@term_edit')->name('golf.admin.attribute.term.edit');
    Route::post('term_store','AttributeController@term_store')->name('golf.admin.attribute.term.store');
    Route::post('/editTermBulk','AttributeController@editTermBulk')->name('golf.admin.attribute.term.editTermBulk');

    Route::get('getForSelect2','AttributeController@getForSelect2')->name('golf.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('golf.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('golf.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('golf.admin.availability.store');
    Route::match(['get','post'],'/store-bulk-edit','AvailabilityController@storeBulkEdit')->name('golf.availability.storeBulkEdit');
    Route::post('/loadDataService','AvailabilityController@loadDataService')->name('golf.admin.availability.loadDataService');
});
