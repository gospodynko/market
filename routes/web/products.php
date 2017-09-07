<?php

Route::get('products/{slug}', ['uses' => 'ProductsController@show', 'as' => 'products.show']);
Route::post('products/{slug}/send-review', 'ProductsController@storeReview');
Route::get('storeproduct/{id}', ['uses' => 'ProductsController@showStoreProduct', 'as' => 'products.show.store']);

Route::resource('productsoffers', 'ProductOffersController');

//virtual
Route::resource('virtualproducts', 'VirtualProductsController');
