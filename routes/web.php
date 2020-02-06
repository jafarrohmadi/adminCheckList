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

Route::redirect('/', '/adminCheckList/login');
Route::get('/login', ['as' =>'login' ,'uses' =>'ClientController@redirect']);

#Route::redirect('/', '/site/login');
#Route::get('/login', [ 'as' => 'login', 'uses' => 'ClientController@redirect' ]);

Route::get('/callback', 'ClientController@callback')->name('callback');

Route::group([ 'middleware' => [ 'auth' ] ], function () {
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

    Route::get('/getCheckListEmployeeByUserId/{id}', 'Admin\CheckListController@getCheckListEmployeeByUserId');
    Route::post('/saveOperTugas', 'Admin\CheckListController@saveOperTugas');
    Route::put('/updateOperTugas/{id}', 'Admin\CheckListController@updateOperTugas');
    Route::delete('/checkListProcessDelete/{id}', 'Admin\CheckListController@checkListProcessDelete');
    Route::get('/getUserCheckListOperTugasToById/{id}', 'Admin\CheckListController@getUserCheckListOperTugasToById');
    Route::put('/checkListProgressDetailEditById/{id}', 'Admin\CheckListController@checkListProgressDetailEditById');
    Route::get('/getCheckListProgressDetailByCheckListProgressId/{id}', 'Admin\CheckListController@getCheckListProgressDetailByCheckListProgressId');
    Route::get('/getCheckListEmployeeDetail/{id}', 'Admin\CheckListController@getCheckListEmployeeDetail');

    Route::get('/getOnDutyData', 'Admin\CheckListController@getOnDutyData');

    Route::get('/filterChecklistProgressDate/{date}', 'Admin\CheckListController@filterChecklistProgressDate');

    Route::get('/getLocation/', 'Admin\CheckListController@getLocation');
    Route::post('/storeLocation/', 'Admin\CheckListController@storeLocation');
    Route::put('/updateLocation/{id}', 'Admin\CheckListController@updateLocation');
    Route::delete('/deleteLocation/{id}', 'Admin\CheckListController@deleteLocation');
    Route::get('/getTugasList/', 'Admin\CheckListController@getTugasList');
    Route::delete('/checkListEmployeeDelete/{id}', 'Admin\CheckListController@checkListEmployeeDelete');
});
