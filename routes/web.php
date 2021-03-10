<?php

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



Route::namespace('frontend')->group(function(){
    Route::get('/','FrontPageController@index')->name('frontpage');
    Route::get('/find-data','FrontPageController@filter')->name('data.filter');
});


Route::group(['namespace' => 'frontend','middleware' => 'auth'],function(){
    //for prescription type
    Route::get('/prescription-category','PrescriptionController@index')->name('index.type');
    Route::post('/prescription-category','PrescriptionController@store')->name('store.type');
    Route::delete('/destroy/{id}','PrescriptionController@destroy')->name('destroy.type');

    //for User data
    Route::get('/user-data','UserinformationController@index')->name('index.userdata');
    Route::post('/user-data','UserinformationController@store')->name('store.userdata');
    Route::delete('/delet/{id}','UserinformationController@destroy')->name('destroy.userdata');

    //for send Data
    Route::get('/receive-item','SenditemController@index')->name('index.receiveitem');
    Route::post('/send-item','SenditemController@store')->name('store.senditem');
    Route::delete('/delet-senddata/{id}','SenditemController@destroy')->name('destroy.senditem');
//    Route::delete('/delete-doctortype/{id}','DoctortypeController@destroy')->name('destroy.doctortype');

    //for City
    Route::get('/city','CityController@index')->name('index.city');
    Route::post('/city','CityController@store')->name('store.city');
    Route::delete('/destro/{id}','CityController@destroy')->name('destroy.city');

    //for Category
    Route::get('/category','CategoryController@index')->name('index.category');
    Route::post('/category','CategoryController@store')->name('store.category');
    Route::delete('/delete-category/{id}','CategoryController@destroy')->name('destroy.category');

    //for Doctory Type
    Route::get('/doctor','DoctortypeController@index')->name('index.doctortype');
    Route::post('/doctor','DoctortypeController@store')->name('store.doctortype');
    Route::delete('/delete-doctortype/{id}','DoctortypeController@destroy')->name('destroy.doctortype');

    //for Doctory & Hospital Information
    Route::get('/hospital-doctor','HospitalinformationController@index')->name('index.doctorhospital');
    Route::post('/hospital-doctor','HospitalinformationController@store')->name('store.doctorhospital');
    Route::delete('/delete-hospital-doctor/{id}','HospitalinformationController@destroy')->name('destroy.doctorhospital');

    Route::get('/hospital-doctor-information','HospitalinformationController@show')->name('index.doctorhospital.information');

    //profile & change Password
    Route::get('/profile/{id}','ProfileController@index')->name('user.profile');
    Route::post('/profile/{id}','ProfileController@update')->name('user.profile.update');
    Route::post('/changePassword','ProfileController@changePassword')->name('user.profile.changePassword');
});



Route::post('/registration','Auth\RegisterController@store')->name('register.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
