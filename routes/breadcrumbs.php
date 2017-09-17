<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 17.09.2017
 * Time: 10:42
 */


//home

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('titles.main'), route('home'));
});

Breadcrumbs::register('category', function ($breadcrumbs, $category){
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->name, route('category', $category->slug));
});

Breadcrumbs::register('subcategory', function ($breadcrumbs, $category){
    $breadcrumbs->parent('category', $category->parent);
    $breadcrumbs->push($category->name, route('category', $category->slug));
});

Breadcrumbs::register('product', function ($breadcrumbs, $product){
    if($product->category->parent){
        $breadcrumbs->parent('subcategory', $product->category);
    } else {
        $breadcrumbs->parent('category', $product->category);
    }
    $breadcrumbs->push($product->name, route('products.show', $product->slug));

});