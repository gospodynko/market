<?php

Route::get('products/{id}', ['uses' => 'ProductsController@show', 'as' => 'products.show']);
Route::get('storeproduct/{id}', ['uses' => 'ProductsController@showStoreProduct', 'as' => 'products.show.store']);

Route::resource('productsoffers', 'ProductOffersController');

//virtual
Route::resource('virtualproducts', 'VirtualProductsController');
