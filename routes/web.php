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

/*header('Access-Control-Allow-Origin: http://localhost:8100');
header('Access-Control-Allow-Credentials: true');*/

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET,POST,DELETE');

Route::get('/', function () {
    return view('auth.login');
    //return view('formshare');
});

Auth::routes();

//**********************************************POST REQUEST********************************************/

Route::post('/add_company', 'ProjectController@add_company')->name('add_company');
Route::post('/edit_company', 'ProjectController@edit_company')->name('edit_company');
Route::post('/delete_company', 'ProjectController@delete_company')->name('delete_company');

//**********************************************POST REQUEST********************************************/

//**********************************************GET REQUEST********************************************/
Route::get('/get_company', 'ProjectController@get_company')->name('get_company');

//**********************************************GET REQUEST********************************************/

Route::get('/logout', 'ProjectController@logout')->name('logout');

///

Route::get('/getAdminData', 'AdminController@getAdminData')->name('getAdminData');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'RegisterController@profile')->name('profile')->middleware('auth');

Route::post('/postsignup', 'RegisterController@postsignup')->name('postsignup');

Route::get('/getsignup', 'RegisterController@getsignup')->name('getsignup');
Route::post('/postsignin', 'RegisterController@postsignin')->name('postsignin');
Route::get('/getsignin', 'RegisterController@getsignin')->name('getsignin');
