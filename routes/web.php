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
Route::put('/updateOperTugas/{id}', 'Admin\CheckListController@updateOperTugas');
Route::delete('/checkListProcessDelete/{id}', 'Admin\ChecklistController@checkListProcessDelete');
Route::get('/getUserCheckListOperTugasToById/{id}', 'Admin\CheckListController@getUserCheckListOperTugasToById');
Route::put('/checkListProgressDetailEditById/{id}', 'Admin\ChecklistController@checkListProgressDetailEditById');
Route::get('/getCheckListProgressDetailByCheckListProgressId/{id}', 'Admin\ChecklistController@getCheckListProgressDetailByCheckListProgressId');

Route::get('/getOnDutyData', 'Admin\ChecklistController@getOnDutyData');

Route::get('/filterChecklistProgressDate/{date}', 'Admin\ChecklistController@filterChecklistProgressDate');
