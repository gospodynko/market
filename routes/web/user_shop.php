<?php

Route::group(['roles' => ['seller'], 'middleware' => ['auth', 'roles']], function () {
    Route::get('/user/shop', function (){
       return view('user_shop.main.main');
    });
});