<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 8/3/17
 * Time: 11:51 AM
 */

Route::group(['roles' => ['admin'], 'middleware' => ['auth', 'roles']], function () {

    Route::post('admin/category/upload', 'FileController@img');

    Route::get('admin/products/create', ['uses' => 'ProductsController@createAdmin', 'as' => 'products.admin.create']);

    Route::get('/admin/producers/by_category', ['uses' => 'AdminController@getProducersList', 'as' => 'admin.producers.getlist']);

    Route::get('/admin/products/by_producer', ['uses' => 'AdminController@getProductsList', 'as' => 'products.admin.getlistByProduser']);

    Route::get('/admin/products/by_category', ['uses' => 'ProductsController@getListAdmin', 'as' => 'products.admin.getlist']);

    Route::post('admin/products', ['uses' => 'ProductsController@storeAdmin', 'as' => 'products.admin.store']);

    Route::get('admin/products', ['uses' => 'AdminController@indexProducts', 'as' => 'products.admin']);
    Route::get('admin/orders', ['uses' => 'AdminController@indexOrders', 'as' => 'orders.admin']);

    Route::get('/admin/user-products', 'AdminController@indexUserProducts');
    Route::get('/admin/user-products/{id}/edit', 'AdminController@editUserProducts');
    Route::put('/admin/user-products/{id}', 'AdminController@updateUserProducts');

    Route::get('admin/products/{id}/edit', ['uses' => 'ProductsController@editAdmin', 'as' => 'products.admin.edit']);
    Route::get('admin/products/{id}/delete', ['uses' => 'AdminController@delProductAdmin', 'as' => 'products.admin.delete']);
    Route::get('admin/user-products/{id}/delete', ['uses' => 'AdminController@delProductUserAdmin', 'as' => 'products-user.admin.delete']);

    Route::put('admin/products/{id}', ['uses' => 'ProductsController@updateAdmin', 'as' => 'products.admin.update']);

    Route::get('admin/producers', ['uses' => 'AdminController@indexProducers', 'as' => 'admin.producers']);

    Route::get('admin/producers/create', ['uses' => 'AdminController@createProducer', 'as' => 'admin.producers.create']);

    Route::post('admin/producers/create', ['uses' => 'AdminController@storeProducer', 'as' => 'admin.producers.store']);

    Route::get('admin/producers/{id}/edit', ['uses' => 'AdminController@editProducer', 'as' => 'admin.producers.edit']);

    Route::put('admin/producers/{id}', ['uses' => 'AdminController@updateProducer', 'as' => 'admin.producers.update']);

    Route::post('admin/banner', 'AdminController@createBanner');

    Route::get('admin/banner', 'AdminController@getBannersList');
    Route::get('admin/banner/create', function (){
        return view('dashboard.sections.banners.create');
    });
    Route::get('admin/moderation', 'AdminController@moderateList');
    Route::group(['prefix' => 'admin/deliveries'], function (){
        Route::get('/', 'AdminController@deliveryList');
        Route::get('/create', 'AdminController@deliveryCreate');
        Route::post('/create', 'AdminController@storeDelivery');
    });
    Route::group(['prefix' => 'admin/payments'], function (){
        Route::get('/', 'AdminController@paymentList');
        Route::get('/create', 'AdminController@paymentCreate');
        Route::post('/create', 'AdminController@storePayment');
    });

    Route::get('admin/moderation/accept/{id}', 'AdminController@acceptProduct');
    Route::get('admin/moderation/show/{id}', 'AdminController@viewProduct');

    Route::group(['prefix' => 'admin/shops'], function (){
       Route::any('/', 'AdminController@viewShops');
       Route::post('/{id}/edit', 'AdminController@changeStatusShop');
    });

});