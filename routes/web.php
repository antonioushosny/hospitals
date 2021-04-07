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


Auth::routes([ 'verify' => true ]);
 
Route::get('/login', 'AuthController@getLogin')->name('login');
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


 


 