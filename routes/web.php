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


Route::get('/','IndexController@index');
Route::get('detail/{id}','IndexController@detail');
Route::get('cartoon/{id}/{list_id}','IndexController@cartoon');
Route::get('list/{id}','IndexController@cartoon_list');
Route::get('cate','IndexController@cate');


/**
 * my我的
 */
Route::get('my','MyController@my');



/**
 * 登陆注册
 */

Route::get('login','LoginController@login');
Route::get('reg','LoginController@reg');
Route::post('doLogin','LoginController@doLogin');
Route::post('doReg','LoginController@doReg');

