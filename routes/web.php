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

//管理后台路由
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    //通过中间件验证
    Route::group(['middleware'=>'checkadminlogin'],function (){
        //后台首页
        Route::get('/','IndexController@index');
        //欢迎页面
        Route::get('index/welcome','IndexController@welcome');
        //管理员路由
        Route::resource('admin','AdminController');
        //用户退出
        Route::get('logout','PublicController@logout');

    });
    //用户登录
    Route::match(['get','post'],'login','PublicController@login');

});

//Route::get('/', function () {
//    //return view('welcome');
//});
