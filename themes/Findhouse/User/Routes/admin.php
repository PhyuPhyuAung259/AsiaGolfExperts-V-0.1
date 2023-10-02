<?php
use \Illuminate\Support\Facades\Route;

Route::get('/getNotInAgency','UserController@getNotInAgency')->name('user.admin.getNotInAgency');

Route::post('/store/{id}','UserController@store')->name('user.admin.store');

