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
//Route::get('index','Index\Text@login');
//Route::post('logindo','Index\Text@logindo');
//品牌路由
Route::prefix('brand')->group(function () {

    Route::get('/','admin\brand@index');//列表
    Route::get('create','admin\brand@create');//添加
    Route::post('store','admin\brand@store');//添加执行
    Route::get('destroy/{id}','admin\brand@destroy');//删除
    Route::get('edit/{id}','admin\brand@edit');//修改
    Route::post('update/{id}','admin\brand@update');//执行修改

});
//分类路由
Route::prefix('category')->group(function () {
    Route::get('/','admin\categorycontroller@index');//列表展示
    Route::get('create','admin\categorycontroller@create');//t添加
    Route::post('store','admin\categorycontroller@store');//执行添加
    Route::get('destroy/{id}','admin\categorycontroller@destroy');//删除
    Route::get('edit/{id}','admin\categorycontroller@edit');//修改
    Route::post('update','admin\categorycontroller@update');//执行修改

});

//周考路由
Route::prefix('wenzhang')->group(function () {
    Route::get('/','admin\WenzhangController@index');//列表展示
    Route::get('create','admin\WenzhangController@create');//添加
    Route::post('store','admin\WenzhangController@store');//执行添加
    Route::get('destroy/{id}','admin\WenzhangController@destroy');//删除
    Route::get('edit/{id}','admin\WenzhangController@edit');//修改
    Route::post('update','admin\WenzhangController@update');//执行修改

});


//


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/send_email','MailController@send_email');//邮箱

    Route::get('/','Index\IndexController@index');//首页
    Route::get('/login','Index\IndexController@login');//登录
    Route::get('/store','Index\IndexController@store');//执行注册
    Route::get('/reg','Index\IndexController@reg');//注册
    Route::get('/prolist','Index\IndexController@prolist');//全部商品展示
    Route::get('/proinfo/{id}','Index\IndexController@proinfo');//全部商品展示
    Route::get('/user','Index\IndexController@user');//个人中心
    Route::get('/car','Index\IndexController@car');//购物车
