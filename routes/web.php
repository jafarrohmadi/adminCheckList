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

Route::redirect('/', '/site/login');
//Route::get('/login', ['as' =>'login' ,'uses' =>'ClientController@redirect']);
Auth::routes();

#Route::redirect('/', '/site/login');
//Route::get('/login', 'ClientController@login');
//Route::get('/redirect', ['as' => 'login', 'uses' => 'ClientController@redirect']);

//Route::get('/login', ['as' => 'login', 'uses' => 'ClientController@redirect']);
//
//Route::get('/callback', 'ClientController@callback')->name('callback');

Route::get('/', 'ComproController@index');
Route::get('/product', 'ComproController@product');
Route::get('/price', 'ComproController@price')->name('price');
Route::get('/faq', 'ComproController@faq');
Route::post('/contactUs', 'ComproController@contactUs');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checklist', 'Admin\CheckListController@index')->name('checklist');
    Route::post('/checkListEmployeeSave', 'Admin\CheckListController@checkListEmployeeSave');
    Route::put('/editCheckListProgress/{id}', 'Admin\CheckListController@editCheckListProgress');
    Route::get('/getCheckList/', 'Admin\CheckListController@getCheckList');
    Route::post('/storeCheckList/', 'Admin\CheckListController@storeCheckList');
    Route::put('/updateCheckList/{id}', 'Admin\CheckListController@updateCheckList');
    Route::delete('/deleteCheckList/{id}', 'Admin\CheckListController@deleteCheckList');
    Route::get('/getDataCheckListProgress/{id}', 'Admin\CheckListController@getDataCheckListProgress');

    Route::get('/getUserEmployee', 'Admin\CheckListController@getUserEmployee');

    Route::get('/getUserEmployeeHaveCheckList', 'Admin\CheckListController@getUserEmployeeHaveCheckList');

    Route::get('/getUserEmployeeDontHaveCheckList', 'Admin\CheckListController@getUserEmployeeDontHaveCheckList');

    Route::get('/getCheckListEmployeeByUserId/{id}/{location}',
        'Admin\CheckListController@getCheckListEmployeeByUserId');
    Route::post('/saveOperTugas', 'Admin\CheckListController@saveOperTugas');
    Route::put('/updateOperTugas/{id}', 'Admin\CheckListController@updateOperTugas');
    Route::delete('/checkListProcessDelete/{id}', 'Admin\CheckListController@checkListProcessDelete');
    Route::get('/getUserCheckListOperTugasToById/{id}', 'Admin\CheckListController@getUserCheckListOperTugasToById');
    Route::put('/checkListProgressDetailEditById/{id}', 'Admin\CheckListController@checkListProgressDetailEditById');
    Route::get('/getCheckListProgressDetailByCheckListProgressId/{id}',
        'Admin\CheckListController@getCheckListProgressDetailByCheckListProgressId');
    Route::get('/getCheckListEmployeeDetail/{id}', 'Admin\CheckListController@getCheckListEmployeeDetail');

    Route::get('/getOnDutyData', 'Admin\CheckListController@getOnDutyData');

    Route::get('/filterChecklistProgressDate/{date}', 'Admin\CheckListController@filterChecklistProgressDate');

    Route::get('/getLocation/', 'Admin\CheckListController@getLocation');
    Route::post('/storeLocation/', 'Admin\CheckListController@storeLocation');
    Route::put('/updateLocation/{id}', 'Admin\CheckListController@updateLocation');
    Route::delete('/deleteLocation/{id}', 'Admin\CheckListController@deleteLocation');
    Route::get('/getTugasList/', 'Admin\CheckListController@getTugasList');
    Route::get('/getOperTugasList/', 'Admin\CheckListController@getOperTugasList');
    Route::delete('/checkListEmployeeDelete/{id}', 'Admin\CheckListController@checkListEmployeeDelete');
    Route::put('/editOperTugasList/{id}', 'Admin\CheckListController@editOperTugasList');

    Route::get('/checklist/getCheckListProgress/{id}', 'Admin\CheckListController@getCheckListProgress');

    //User
    Route::get('/getQuotaLeave', 'Admin\UserController@getQuotaLeave');
    Route::get('/getUser/{id}', 'Admin\UserController@getUser');
    Route::get('/getAllUser', 'Admin\UserController@getAllUser');
    Route::get('/management_user', 'Admin\UserController@index');
    Route::post('/management_user', 'Admin\UserController@store');
    Route::put('/management_user/{id}', 'Admin\UserController@update');
    Route::delete('/management_user/{id}', 'Admin\UserController@destroy');

    //Licence
    Route::get('/licence', 'Admin\LicenceController@index');
    Route::post('/licence', 'Admin\LicenceCotroller@store');

    //Licence
    Route::get('/subscribe', 'Admin\SubscribeController@index');
    Route::post('/subscribe', 'Admin\SubscribeController@store');

    //report
    Route::get('/report', 'Admin\CheckListController@report');
    //Route::get('/report/{start_date}/{end_date}', 'Admin\CheckListController@reportfilter');
    Route::get('/report/filterChecklistProgressDate/{date}',
        'Admin\CheckListController@reportfilterChecklistProgressDate');
    Route::get('/report/getCheckListProgress/{id}', 'Admin\CheckListController@reportGetCheckListProgress');
    Route::get('/report/reportDownload', 'Admin\CheckListController@reportDownload');

});

Route::group(['prefix' => 'otp', 'as' => 'otp.'], function () {
    Route::post('/check-user', 'UserController@isRegistered')->name('check.user');
});

