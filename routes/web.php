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

Route::get('/dataImport', function () { return view('dataImport');});//資料匯入 
Route::get('dataHandle','DataListController@toDataHandle');//資料處理作業
Route::get('dataAdd','DataListController@toDataAdd');//資料處理作業
Route::get('dataListSearch','DataListController@toDataListSearch');//商品明細資訊查詢
Route::get('dataPriceSearch','DataListController@toDataPriceSearch');//商品價格查詢
Route::get('dataAnalysisChart','DataListController@toDataAnalysisChart');//商品分析圖
Route::get('/bigDataAnalysis', 'DataListController@toBigDataAnalysis');//大數據資訊分析
Route::get('/dataDashboard', function () {return view('dataDashboard');});//產業分析儀表板
Route::get('/dataManage', 'DataListController@toDataManage');//後台管理系統
