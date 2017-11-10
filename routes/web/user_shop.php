<?php
Route::group(['prefix' => 'user-shop', 'roles' => ['seller', 'admin'], 'middleware' => ['auth', 'roles']], function () {
    Route::get('/{shop}', ['uses' => 'UserShopController@getShopPage', 'as' => 'user_shop.show']);

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', function () {
            return view('user_shop.main.main');
        });
        Route::get('/{id}/create', 'UserShopController@createProduct');
        Route::post('/create', 'UserShopController@storeProduct');
    });

//    Route::group(['prefix' => 'shop'], function (){
//       Route::get('/', function (){
//           return view('user_shop.main.main');
//       });
//       Route::get('/{id}/create', function (){
//           return view('user_shop.main.main');
//       });
//    });
    Route::get('/all-shops', 'UserShopController@getShops');
});
