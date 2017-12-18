<?php
Route::get('/all-shops', 'UserShopController@getShops');


Route::group(['prefix' => 'shop', 'roles' => ['seller', 'admin']], function () {

    Route::get('/orders', ['uses' => 'UserShopController@getShopOrders', 'as' => 'user_shop.orders']);

    Route::get('/{shop}', ['uses' => 'UserShopController@getShopPage', 'as' => 'user_shop.show']);
    Route::post('/{shop}/load', ['uses' => 'UserShopController@loadProducts', 'as' => 'user_shop.load_products']);

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', function () {
            return view('user_shop.main.main');
        });
        Route::get('/{id}/create', 'UserShopController@createProduct');

        Route::post('/create', 'UserShopController@storeProduct');
    });

});
