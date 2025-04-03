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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','PostsController@index')->name('top');

Route::get('/layout','PostsController@layout')->name('layout');

Auth::routes();

Route::post('/store', 'UserRegisterController@store')->name('store');

Route::get('/home', 'HomeController@index')->name('home');

//ダミーデータを表示する
Route::get('/posts.result','PostsController@result')->name('result');

//検索結果を表示する
Route::get('/serch','PostsController@serch')->name('serch');

Route::get('/mypage', 'MyPageController@index')->name('mypage');

Route::get('/userregist', 'UserRegisterController@index')->name('userregist');

// マイページを表示する
Route::group(['prefix'=>'mypages' /*, 'middleware'=>'auth' */ ],function(){
    Route::get('/{id}','MyPageController@show')->name('mypages.show');
    Route::get('/{id}/edit','MyPageController@edit')->name('mypages.edit');
    Route::PATCH('/{id}','MyPageController@update')->name('mypages.update');
            });

//掲示板を表示する
Route::get('/boards', 'BoardsController@index')->name('boards');
Route::post('/create', 'BoardsController@create')->name('boards');
Route::get('/boards/{id}', 'BoardsController@show')->name('boards');