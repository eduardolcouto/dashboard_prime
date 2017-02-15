<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('dashboard',['as'=>'dashboard.index','uses'=>'DashboardController@index']);
Route::get('dashbmw',['as'=>'dashboard.dashbmw','uses'=>'DashboardController@dashBmw']);
Route::get('api/get-total-backlog','DashboardController@totalBacklog');
Route::get('api/get-aging','DashboardController@totalAging');
Route::get('api/get-pesquisa-satisfacao','DashboardController@PesquisaSatisfacao');
Route::get('dashboard_cst',['as'=>'dashboard_cst.index','uses'=>'DashboardController@dashcst']);
