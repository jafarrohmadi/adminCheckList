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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'site', 'as' => 'site.'], function () {
    Route::get('/checklist', 'Admin\ChecklistController@index');
    Route::post('/checkListEmployeeSave', 'Admin\ChecklistController@checkListEmployeeSave');
    Route::put('/editCheckListProgress/{id}', 'Admin\ChecklistController@editCheckListProgress');
    Route::get('/getCheckList/', 'Admin\ChecklistController@getCheckList');
    Route::post('/storeCheckList/', 'Admin\ChecklistController@storeCheckList');
    Route::put('/updateCheckList/{id}', 'Admin\ChecklistController@updateCheckList');
    Route::delete('/deleteCheckList/{id}', 'Admin\ChecklistController@deleteCheckList');
    Route::get('/getDataCheckListProgress/{id}', 'Admin\ChecklistController@getDataCheckListProgress');

    Route::get('/login', 'ClientController@redirect')->name('get.token');

    Route::get('/callback', 'ClientController@callback')->name('callback');

    Route::get('/getUserEmployee', 'Admin\ChecklistController@getUserEmployee');

    Route::get('/getUserEmployeeHaveCheckList', 'Admin\ChecklistController@getUserEmployeeHaveCheckList');

    Route::get('/getUserEmployeeDontHaveCheckList', 'Admin\ChecklistController@getUserEmployeeDontHaveCheckList');

    Route::get('/getCheckListEmployeeByUserId/{id}', 'Admin\ChecklistController@getCheckListEmployeeByUserId');
    Route::post('/saveOperTugas', 'Admin\ChecklistController@saveOperTugas');
    Route::delete('/checkListProcessDelete/{id}', 'Admin\ChecklistController@checkListProcessDelete');

    Route::put('/checkListProgressDetailEditById/{id}', 'Admin\ChecklistController@checkListProgressDetailEditById');
    Route::get('/getCheckListProgressDetailByCheckListProgressId/{id}', 'Admin\ChecklistController@getCheckListProgressDetailByCheckListProgressId');

    Route::get('/getOnDutyData', 'Admin\ChecklistController@getOnDutyData');
    Route::get('/userChecklist', 'User\CheckListController@index')->name('user.checklist');
    Route::get('/userHistory', 'User\CheckListController@userHistory');
    Route::get('/getUserNote', 'User\CheckListController@getUserNote');
});

Auth::routes();

Route::get('/home', 'CheckListController@index')->name('home');
