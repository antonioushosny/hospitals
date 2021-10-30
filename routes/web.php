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


Route::get('/blank', function(){
    return view('blank');
})->name('blank');

Route::get('lang/{lang}', 'MainController@lang')->name('lang');
 
// Auth::routes();

Route::get(trans('routes.aboutUs'), 'MainController@aboutUs')->name('aboutUs'); // about us page
Route::get(trans('routes.terms'), 'MainController@terms')->name('terms'); // about us page
Route::get(trans('routes.policy'), 'MainController@policy')->name('policy'); // about us page
Route::get(trans('routes.contactus'), 'MainController@contactus')->name('contactus'); // complaints  page
Route::post('/contactus/add', 'MainController@addcontactus')->name('postcontactus'); // complaints  post 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/news', 'HomeController@news')->name('news');
Route::get('/news/{news}', 'HomeController@showNews')->name('news.show');
Route::get('/hospitals', 'HomeController@hospitals')->name('hospitals');
Route::get('/hospitals/{hospital}', 'HomeController@showHospital')->name('hospitals.show');

Auth::routes([ 'verify' => true ]);
 
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::get('/login/{type}', 'AuthController@getLogin')->name('hospitalLogin');
Route::post('/login', 'AuthController@postLogin')->name('postLogin');
Route::get('/register/{type}', 'AuthController@getRegister')->name('getRegister');
Route::post('/register', 'AuthController@postRegister')->name('postRegister');
Route::get('/profile/{type}/', 'AuthController@getProfile')->name('getProfile');
Route::post('/profile', 'AuthController@postProfile')->name('postProfile');

Route::get('/logout/{type}', 'AuthController@logout')->name('logout');
Route::post('/changePassword', 'AuthController@SavePassword')->name('SavePassword');
Route::get('/client/verify/{tokn}', 'AuthController@clientVerify')->name('client.verify');
Route::get('/client/verify/resend/{id}', 'AuthController@verifyResend')->name('client.verify.resend');
Route::post('/client/resetPassword/form', 'AuthController@resetPasswordForm')->name('client.resetPassword.form');
Route::get('/client/resetPassword/{id}', 'AuthController@PasswordReset')->name('client.resetPassword');
Route::post('/client/resetPassword/reset', 'AuthController@resetPasswordReset')->name('client.resetPassword.reset');
 
Route::get('/getObject/{type}/{id}', 'AuthController@getObject')->name('getObject'); //for web view 

// front routes 
Route::get('/', function () {
	return redirect()->route('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth:client'], function () {
    Route::get('/client/changePassword/', 'AuthController@changePassword')->name('client.changePassword');
    Route::get('/orders/client_orders', 'OrdersController@clientOrders')->name('orders.client_orders');
    Route::get('/orders/add', 'OrdersController@addOrder')->name('orders.add_order');
    Route::post('/orders/save', 'OrdersController@save')->name('orders.save');
    Route::get('clients/orders/show/{order}', 'OrdersController@show')->name('clients.orders.show');

});
Route::group(['middleware' => 'auth:hospital'], function () {
	Route::get('/orders/hospital_orders', 'OrdersController@hospitalOrders')->name('orders.hospital_orders');
	Route::get('/orders/edit/{order}', 'OrdersController@editOrder')->name('orders.edit');
	Route::put('/orders/update/{order}', 'OrdersController@update')->name('orders.update');
	Route::get('/orders/show/{order}', 'OrdersController@show')->name('orders.show');

});

// for forget and reset password for client
Route::prefix('/client')->name('client.')->namespace('Client')->group(function(){
	Route::namespace('Auth')->group(function(){
		
		//Forgot Password Routes
		Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request') ;
		Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email') ;

		//Reset Password Routes
		Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset') ;
		Route::post('/password/reset','ResetPasswordController@reset')->name('password.update') ;
	});
});

Route::group(['middleware' => 'auth:client'], function () {
	Route::get('/client/changePassword/', 'AuthController@changePassword')->name('client.changePassword');
});

Route::get('/token/{token}','HomeController@savetoken')->name('savetoken');
Route::get('/MarkAllSeen' ,'Controller@AllSeen')->name('MarkAllSeen');


 


 