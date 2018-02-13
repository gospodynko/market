<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
| @author  Gustavo Ocanto <gustavoocanto@gmail.com>
|
*/


use Illuminate\Http\Request;

Auth::routes();

Route::patch('dashboard/categories/{id}' , 'AdminController@updateCategory');

Route::get('register/confirm/{token}/{email}', [
	'as' => 'register.confirm',
	'uses' => 'Auth\RegisterController@confirm']
);

Route::post('/loginOauth', 'Auth\LoginController@loginOauth');
Route::get('/adminlogin', function (){
    return view('auth.login');
});

// home
Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::post('/get-categories', 'HomeController@getCategories');
Route::get('/single-product', function (){
   return view('single-prod') ;
});
Route::get('/product-list', function (){
    return view('prod-list') ;
});
Route::get('/product-list-feedback', function (){
    return view('prod-list-feedback') ;
});
Route::get('/search-page', function (){
    return view('search') ;
});
Route::get('/cart-item', function (){
    return view('cart') ;
});
//All shops button
Route::get('/all-shops', 'HomeController@getShopList');
Route::post('/all-shops', 'HomeController@filterShops');

Route::get('summary', ['uses' => 'HomeController@summary']); //while refactoring

Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index');
});

Route::prefix('search')->group(function () {
    Route::get('/', 'SearchController@index');
    Route::post('/', 'SearchController@search');
});
Route::group(['prefix' => 'category'], function (){
   Route::get('/{slug}',['as' => 'category', 'uses' => 'CategoryController@index']);
   Route::get('/{slug}/{subSlug}',['as' => 'subcategory', 'uses' => 'CategoryController@index']);
});
Route::group(['prefix' => 'api'],function (){
    Route::post('/check-user', 'HomeController@checkUser');
    Route::post('/set-role', 'HomeController@setRole');
});

Route::get('/checkout', 'CheckoutController@index');
Route::get('/checkout/success/{id}', 'CheckoutController@successBuy');

Route::post('/set-order', 'CheckoutController@setOrder');

//users routes
require __DIR__ . '/web/users.php';

//user shop ['role' => 'seller']
require __DIR__ . '/web/user_shop.php';

//business routes
require __DIR__ . '/web/business.php';

//Wpanel Routes
require __DIR__ . '/web/wpanel.php';

//products lists
require __DIR__ . '/web/products.php';

//wish lists
require __DIR__ . '/web/wish_lists.php';

//orders lists
require __DIR__ . '/web/orders.php';

//about
require __DIR__ . '/web/about.php';

//utilities
require __DIR__ . '/web/utilities.php';

//admin
require __DIR__ . '/web/admin.php';


