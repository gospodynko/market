<?php
/**
 * Created by PhpStorm.
 * User: az
 * Date: 8/3/17
 * Time: 11:51 AM
 */

Route::group(['roles' => ['seller', 'admin'], 'middleware' => ['auth', 'roles']], function () {

    Route::get('admin/products/create', ['uses' => 'ProductsController@createAdmin', 'as' => 'products.admin.create']);

    Route::get('/admin/producers/by_category', ['uses' => 'AdminController@getProducersList', 'as' => 'admin.producers.getlist']);

    Route::get('/admin/products/by_producer', ['uses' => 'AdminController@getProductsList', 'as' => 'products.admin.getlistByProduser']);

    Route::get('/admin/products/by_category', ['uses' => 'ProductsController@getListAdmin', 'as' => 'products.admin.getlist']);

    Route::post('admin/products', ['uses' => 'ProductsController@storeAdmin', 'as' => 'products.admin.store']);

    Route::get('admin/products', ['uses' => 'AdminController@indexProducts', 'as' => 'products.admin']);

    Route::get('admin/products/{id}/edit', ['uses' => 'ProductsController@editAdmin', 'as' => 'products.admin.edit']);

    Route::put('admin/products/{id}', ['uses' => 'ProductsController@updateAdmin', 'as' => 'products.admin.update']);

    Route::get('admin/producers', ['uses' => 'AdminController@indexProducers', 'as' => 'admin.producers']);

    Route::get('admin/producers/create', ['uses' => 'AdminController@createProducer', 'as' => 'admin.producers.create']);

    Route::post('admin/producers/create', ['uses' => 'AdminController@storeProducer', 'as' => 'admin.producers.store']);

    Route::get('admin/producers/{id}/edit', ['uses' => 'AdminController@editProducer', 'as' => 'admin.producers.edit']);

    Route::put('admin/producers/{id}', ['uses' => 'AdminController@updateProducer', 'as' => 'admin.producers.update']);

    Route::post('admin/banner', 'AdminController@createBanner');

    Route::get('admin/banner', 'AdminController@getBannersList');
});