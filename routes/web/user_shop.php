<?php

Route::group(['prefix' => 'user-shop','roles' => ['seller'], 'middleware' => ['auth', 'roles']], function () {
    Route::group(['prefix' => 'shop'], function (){
        Route::get('/', function (){
            return view('user_shop.main.main');
        });
        Route::get('/{id}/create', 'UserShopController@createProduct');
    });

//    Route::group(['prefix' => 'shop'], function (){
//       Route::get('/', function (){
//           return view('user_shop.main.main');
//       });
//       Route::get('/{id}/create', function (){
//           return view('user_shop.main.main');
//       });
//    });
    Route::get('/user/all-shops', 'UserShopController@getShops');
});