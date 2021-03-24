<?php

use Illuminate\Support\Facades\Route;

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
//   return view('login');
// });



Route::get('/', 'Auth\LoginController@index')->name('/');
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@create');
Route::post('/', 'Auth\RegisterController@userregister');

Route::get('/verify', 'Auth\VerifyController@index');
Route::get('/verify/{token}', 'Auth\VerifyController@verifyemail');

Route::get('/reqverify/', 'Auth\VerifyController@home');
Route::post('/reqverify/', 'Auth\VerifyController@reqverify');

Route::get('/passwordreset', 'Auth\ResetPasswordController@index');
Route::patch('/passwordreset', 'Auth\ResetPasswordController@requestreset');

Route::get('/passwordreset/{token}', 'Auth\ResetPasswordController@resetpassword');
Route::post('/passwordreset/', 'Auth\ResetPasswordController@updatepassword');

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function(){
  Route::group(['middleware' => ['login:admin']], function(){
      Route::get('admin', 'AdminController@index');
  });

  Route::group(['middleware' => ['login:user']], function(){
      Route::get('user', 'UserController@index');
  });
});

