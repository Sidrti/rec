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
Route::get('AmountFilter', 'App\Http\Controllers\TblAmountFilterController@show')->name('AmountFilter');
Route::get('AmountFilter/{id}', 'App\Http\Controllers\TblAmountFilterController@show');
Route::get('News', 'App\Http\Controllers\news@show')->name('News');
Route::get('ApiTrail', 'App\Http\Controllers\FailSwitchDetailController@index')->name('ApiTrail');
Route::post('MapApi', 'App\Http\Controllers\FailSwitchDetailController@store');
Route::post('AmountFilter/Update', 'App\Http\Controllers\TblAmountFilterController@update')->name('AmountFilter.update');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
