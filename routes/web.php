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
Route::get('my','UserController@my');
//充值页面
Route::get('recharge','UserController@recharge')->middleware('checklogin');
//修改密码页面
Route::get('password','UserController@password')->middleware('checklogin');
Route::post('changePassword','UserController@changePassword');
//留言页面
Route::get('message','UserController@message')->middleware('checklogin');
//留言功能
Route::post('message','UserController@message')->middleware('checklogin');





/**
 * 登陆注册
 */

Route::get('login','LoginController@login');
Route::get('reg','LoginController@reg');
Route::post('doLogin','LoginController@doLogin');
Route::post('doReg','LoginController@doReg');

//注销
Route::post('logOut','LoginController@logOut');



//漫画

Route::get('addCollect','CartoonController@addCollect');

Route::post('delCollect','CartoonController@delCollect');
