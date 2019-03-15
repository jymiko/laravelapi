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

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/home');
    }else{
        return view('auth/login');
    }
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('item','ItemController');
    Route::resource('position','PositionController');   
    Route::resource('user','UserController');
    Route::resource('card','CardController');   
    Route::resource('list','ItemListController');
    Route::resource('carduser','UserCardController');
    Route::resource('itemuser','UserItemController');
    Route::resource('profile','ProfileController');
    

});

Route::resource('regist','RegisterController');

Route::get('/login','Auth/LoginController@login');
Route::get('/home', 'HomeController@index')->name('home.admin');
Route::get('/homeuser','HomeUserController@index')->name('home.user');
Route::get('user/profile','UserController@profile')->name('user.profile');
Route::get('/regist','RegisterController@index')->name('register');
Auth::routes();