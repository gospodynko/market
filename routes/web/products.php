<?php

Route::get('/shop/{market}/{product}', ['uses' => 'ProductsController@show', 'as' => 'products.show']);
Route::post('/shop/{market}/{product}/send-review', 'ProductsController@storeReview');
Route::get('storeproduct/{id}', ['uses' => 'ProductsController@showStoreProduct', 'as' => 'products.show.store']);

Route::resource('productsoffers', 'ProductOffersController');

//virtual
Route::resource('virtualproducts', 'VirtualProductsController');
