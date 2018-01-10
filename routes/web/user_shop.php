<?php

Route::group(['prefix' => 'shop', 'middleware' => 'auth'], function () {

    Route::get('/products', ['uses' => 'UserShopController@getShopProducts', 'as' => 'user_shop.products']);
    Route::get('/orders', ['uses' => 'UserShopController@getShopOrders', 'as' => 'user_shop.orders']);

    Route::get('/product/edit/{id}', ['uses' => 'UserShopController@editProduct']);
    Route::post('/product/update', ['uses' => 'UserShopController@updateProduct']);

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
