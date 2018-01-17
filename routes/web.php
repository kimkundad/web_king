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

Route::auth();

Route::get('/', function () {

  if(Auth::check()){
    return Redirect::to('dashboard');
  }else{
    return view('auth.login');
  }

});

Auth::routes();

Route::get('/redirect', 'FacebookAuthController@redirect');
Route::get('/callback', 'FacebookAuthController@callback');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function () {

  Route::get('dashboard', 'DashboardController@index');
  Route::resource('user_profile', 'ProfileController');
  Route::post('update_pic', 'ProfileController@update_pic');
  Route::resource('user_shop', 'ShopController');
  Route::resource('category', 'CategoryController');
  Route::resource('product', 'ProductController');

  Route::post('api/post_status', 'ProductController@post_status');


  });
