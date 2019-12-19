<?php
/*
|--------------------------------------------------------------------------
| Web Routess
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dataImport', function () {//資料匯入
    return view('dataImport');
});
Route::get('/bigDataAnalysis', 'DataListController@toBigDataAnalysis');
Route::get('/dataDashboard', function () {
    return view('dataDashboard');
});
Route::get('/dataManage', 'DataListController@toDataManage');//後台管理系統
Route::get('dataHandle','DataListController@toDataHandle');//資料處理作業
Route::get('dataListSearch','DataListController@toDataListSearch');//商品明細資訊查詢
Route::get('dataPriceSearch','DataListController@toDataPriceSearch');
Route::get('dataAnalysisChart','DataListController@toDataAnalysisChart');

