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



Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('how-to-sell', 'HomeController@sell');

Route::get('buy', 'HomeController@buy');

Route::get('mybuy', 'HomeController@mybuy');


Route::post('sell_currency', 'HomeController@sell_currency')->name('sell_currency');
Route::get('contact', 'HomeController@contact');
Route::get('policy', 'HomeController@policy');
Route::get('testimonial', 'HomeController@testimonial');
Route::get('terms-conditions', 'HomeController@terms');
Route::get('disclamers', 'HomeController@disclamers');
Route::get('verification', 'HomeController@verification');
Route::get('account-activation', 'HomeController@account_activation');
Route::get('next-of-kin', 'HomeController@next_kin');
Route::post('next-of-kin', 'Auth\LoginController@next_kin');
Route::get('login', 'HomeController@index');
Route::get('blog', 'HomeController@blog');
Route::get('full_post/{id}', 'HomeController@full_post');
Route::post('post/comment', 'HomeController@save_comment');
Route::get('verify-code', 'Auth\RegisterController@verifyCode');
Route::post('verify-code', 'Auth\LoginController@verifyCode');
//Dashboard
Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/buy-bitcoin', 'DashboardController@buy_bitcoin');

Route::post('dashboard/save-bitcoin', 'DashboardController@save_bitcoin');
Route::get('dashboard/buy-perfect-money', 'DashboardController@buy_perfect_money');
Route::get('dashboard/confirm_order', 'ecurrencyController@confirm_order');
Route::get('dashboard/confirm_order', 'ecurrencyController@confirm_order');
Route::post('dashboard/save_perfect_money', 'DashboardController@save_perfect_money');
Route::get('dashboard/sell_bitcoin', 'DashboardController@sell_bitcoin');
Route::post('dashboard/sell_currency', 'HomeController@sell_ecurrency');
Route::get('dashboard/thank-you', 'DashboardController@thank_you');
Route::get('dashboard/thank_you_sell_e_currency', 'DashboardController@thank_you_e_currency');
Route::post('/buy_currency','ecurrencyController@buy_currency')->name('buy_ecurrency');

Route::get('/retry-login', function () {
    return view('auth.retry_login');
});	

//Admin

Route::group(array('middleware' => ['auth', 'auth_admin']), function ()
  {
	Route::get('/administrator', 'Admin\HomeController@index');
	Route::post('/administrator', 'Admin\HomeController@update_rates');
	Route::get('/administrator/new-orders', 'Admin\HomeController@new_orders');
	Route::get('/administrator/change-password', 'Admin\HomeController@change_password');
	Route::post('/administrator/change-password', 'Admin\HomeController@save_password');
	Route::resource('/administrator/sell', 'Admin\SellCurrencyController');
	Route::resource('/administrator/blog', 'Admin\BlogController');
	Route::resource('/administrator/bitcoin', 'Admin\BitCoinController');
	Route::resource('/administrator/perfect-money', 'Admin\PerfectMoneyController');
	Route::resource('/administrator/customer', 'Admin\CustomerController');

  });



Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');


Auth::routes();




Route::group(['middleware'=>'auth'], function() {
	Route::get('userdashboard', 'UserController@userdashboard');
	Route::get('bitcoin_order', 'UserController@bitcoin_order');
	Route::get('pm_order', 'UserController@pm_order');
	Route::get('profile', 'UserController@profile');
	Route::get('message', "UserController@notification");
	Route::get('delete_order/{id}','UserController@delete_order')->name('delete_order');
	Route::get('pm_delete_order/{id}','UserController@pm_delete_order')->name('pm_delete_order');
	Route::get('delete_bitcoin_sell/{id}','UserController@delete_bitcoin_sell')->name('delete_bitcoin_sell');
	Route::get('pm_delete_sell/{id}','UserController@pm_delete_sell')->name('pm_delete_sell');
	Route::get('delete_msg/{id}','NotifyUserController@delete_msg')->name('delete_msg');
	Route::get('viewmsg/{id}', 'NotifyUserController@Viewmsg')->name('viewmsg');
	Route::get('viewbitcoin/{id}', 'NotifyUserController@viewBitcoin')->name('viewbitcoin');
	Route::get('viewsellBitcoin/{id}', 'NotifyUserController@viewsellBitcoin')->name('viewsellbitcoin');
	Route::get('viewPm/{id}', 'NotifyUserController@viewPm');
	Route::get('confirm_sold/{id}', 'NotifyUserController@confirm_sold');
	Route::get('confirm_buypm/{id}', 'NotifyUserController@confirm_buypm');
	Route::get('pm_details/{id}', 'NotifyUserController@pm_details');
	Route::get('confirm_bit/{id}', 'NotifyUserController@confirm_bit');
	Route::get('load_confirmbitsell/{id}', 'NotifyUserController@load_confirmbitsell');
	Route::get('resetpassword', 'UserController@resetPassword')->name('resetpassword');
	Route::post('passwordreset', 'UserController@changepassword')->name('passwordrest');





	//post
	Route::post('confirm_buy_bitcoin', 'UserController@confirm_buy_bitcoin')->name('confirm_bitcoin');
	Route::post('confirm_buy_pm', 'UserController@confirm_pm')->name('confirm_pm');
	Route::post('confirm_sell_bitcoin', 'UserController@confirm_sell_bitcoin')->name('confirm_sell');
	Route::post('confirm_sell_pm', 'UserController@confirm_sell_pm')->name('confirm_sell_pm');
	});



