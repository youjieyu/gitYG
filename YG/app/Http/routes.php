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
    return view('welcome');
});

//后台首页
Route::get("/Admin","Admin\IndexController@index");

//登录页面
Route::get("/Admin/login","Admin\LoginController@index");
Route::post("/Admin/login/logTodo","Admin\LoginController@LogTodo");

//获取验证码的地址
Route::get("/Admin/login/captcha/{tmp}","Admin\LoginController@captcha");
Route::get("/Admin/login/loginout","Admin\LoginController@logout");
Route::post("/Admin/user/avartar","Admin\UserController@avartar");

//用户模块
Route::resource("/Admin/user","Admin\UserController");
Route::match(["get", "post"], "Admin/user", "Admin\UserController@index");
Route::get("/Admin/add","Admin\UserController@add");
Route::post("/Admin/insert","Admin\UserController@insert");
Route::any("/Admin/findname","Admin\UserController@findname");
Route::get("/Admin/user/delete/{id}","Admin\UserController@destroy");