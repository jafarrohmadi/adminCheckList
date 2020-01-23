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

Auth::routes();

Route::get('/checklist', 'Admin\CheckListController@index');
Route::post('/checkListEmployeeSave', 'Admin\CheckListController@checkListEmployeeSave');
Route::put('/editCheckListProgress/{id}', 'Admin\CheckListController@editCheckListProgress');
Route::get('/getCheckList/', 'Admin\CheckListController@getCheckList');
Route::post('/storeCheckList/', 'Admin\CheckListController@storeCheckList');
Route::put('/updateCheckList/{id}', 'Admin\CheckListController@updateCheckList');
Route::delete('/deleteCheckList/{id}', 'Admin\CheckListController@deleteCheckList');
Route::get('/getDataCheckListProgress/{id}', 'Admin\CheckListController@getDataCheckListProgress');

Route::get('/login', 'ClientController@redirect')->name('get.token');

Route::get('/callback', 'ClientController@callback')->name('callback');

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

Route::get('/getOnDutyData', 'Admin\CheckListController@getOnDutyData');


Route::get('/filterChecklistProgressDate/{date}', 'Admin\CheckListController@filterChecklistProgressDate');
