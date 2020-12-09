<?php

use Illuminate\Support\Facades\Route;


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
Route::get('test', 'App\Http\Controllers\TestController@index');
Route::get('ApiInfo/{id}', 'App\Http\Controllers\api_info_controller@index');
Route::get('ApiInfo', 'App\Http\Controllers\api_info_controller@index')->name('ApiInfo');
Route::get('ApiInfo/Update/{id}/{code}/{status}', 'App\Http\Controllers\api_info_controller@update');
Route::get('ApiSettings', 'App\Http\Controllers\view_api_controller@index');
Route::get('ApiSettings', 'App\Http\Controllers\view_api_controller@index')->name('ApiSettings');
Route::get('ApiSettings/Delete/{id}', 'App\Http\Controllers\add_api_controller@destroy');
Route::post('ApiSettings/Edit', 'App\Http\Controllers\view_api_controller@edit')->name('ApiSettings.edit');
Route::post('AddApi', 'App\Http\Controllers\add_api_controller@index');
Route::get('OperatorList', 'App\Http\Controllers\TblMyOperatorController@show')->name('OperatorList');
Route::get('OperatorList/Update/{api_id}/{operator_id}/{operator_api_id}', 'App\Http\Controllers\TblMyOperatorController@update');
Route::get('OperatorStatus/Update/Status/{status_id}/{operator_id}', 'App\Http\Controllers\TblMyOperatorController@updateStatus');
Route::get('OperatorAPI/Update/{operator_id}/{api_id}', 'App\Http\Controllers\TblMyOperatorController@removeAPI');
Route::get('AmountFilter', 'App\Http\Controllers\TblAmountFilterController@show')->name('AmountFilter');
Route::get('AmountFilter/{id}', 'App\Http\Controllers\TblAmountFilterController@show');
Route::get('News', 'App\Http\Controllers\news@show')->name('News');

Route::get('ApiTrail', 'App\Http\Controllers\FailSwitchDetailController@index')->name('ApiTrail');
Route::post('MapApi', 'App\Http\Controllers\FailSwitchDetailController@store');

Route::post('AddNews', 'App\Http\Controllers\news@News_Data');
Route::post('NewsDelete', 'App\Http\Controllers\news@destroy')->name('News.delete');
Route::post('AmountFilter/Update', 'App\Http\Controllers\TblAmountFilterController@update')->name('AmountFilter.update');
Route::get('SmsSettings', 'App\Http\Controllers\sms_api_controller@index')->name('SmsSettings');
Route::post('AddApiSms', 'App\Http\Controllers\add_sms_api@index');
Route::post('SmsSettings/Delete', 'App\Http\Controllers\sms_api_controller@destroy')->name('SmsSettings.delete');
Route::get('APITrailSettings', 'App\Http\Controllers\api_trail_list@index')->name('APITrailSettings');
Route::post('APITrailSettingsDelete', 'App\Http\Controllers\api_trail_list@destroy')->name('APITrailSettings.delete');
Route::post('APITrailSettings/Add', 'App\Http\Controllers\api_trail_list@add')->name('APITrailSettings.add');
Route::get('ManagePackage', 'App\Http\Controllers\PackageMasterController@index')->name('ManagePackage');
Route::get('ManagePackage/Add/{title}/{username}', 'App\Http\Controllers\PackageMasterController@store');

Route::get('AccountList', 'App\Http\Controllers\AccountListController@index')->name('AccountList');
Route::get('AccountList/Status/{user_id}/{status_id}', 'App\Http\Controllers\AccountListController@updateStatus');
Route::post('AccountUpdate/data', 'App\Http\Controllers\AccountListController@updateAccount')->name('AccountUpdate.update');
Route::post('AccountCreate/data', 'App\Http\Controllers\AccountListController@createAccount');
Route::post('TransferStock/data', 'App\Http\Controllers\AccountListController@addTransferStock');
Route::post('MoveAccount/Update', 'App\Http\Controllers\move_account@update');
Route::get('MoveAccount', 'App\Http\Controllers\move_account@index');
Route::get('APIUpdateRecords/{id}/{minutes}/{priority}', 'App\Http\Controllers\api_trail_list@updateRecords');

Route::post('/getdata', 'App\Http\Controllers\AccountListController@getIndividualStatements')->name('stock_getdata');
Route::post('/getdata_credit', 'App\Http\Controllers\AccountListController@getIndividualStatements')->name('credit_getdata');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
