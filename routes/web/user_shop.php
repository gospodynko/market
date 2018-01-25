<?php

Route::group(['prefix' => 'shop'], function () {

    Route::get('/products', ['uses' => 'UserShopController@getShopProducts', 'as' => 'user_shop.products'])->middleware('auth');
    Route::get('/orders', ['uses' => 'UserShopController@getShopOrders', 'as' => 'user_shop.orders'])->middleware('auth');

    Route::get('/product/edit/{id}', ['uses' => 'UserShopController@editProduct'])->middleware('auth');
    Route::post('/product/edit/{id}/status', ['uses' => 'UserShopController@setStatus'])->middleware('auth');
    Route::post('/product/update/{id}', ['uses' => 'UserShopController@updateProduct'])->middleware('auth');
    Route::post('/product/remove/{id}', ['uses' => 'UserShopController@removeProduct'])->middleware('auth');
    Route::post('/product/{id}/delete-image', ['uses' => 'UserShopController@removeImage'])->middleware('auth');

    Route::get('/{shop}', ['uses' => 'UserShopController@getShopPage', 'as' => 'user_shop.show']);
    Route::post('/{shop}/load', ['uses' => 'UserShopController@loadProducts', 'as' => 'user_shop.load_products']);

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', function () {
            return view('user_shop.main.main');
        })->middleware('auth');
        Route::get('/{id}/create', 'UserShopController@createProduct')->middleware('auth');

        Route::post('/create', 'UserShopController@storeProduct')->middleware('auth');
    });

});
