<?php

get('product', [
    'uses' => 'ProductsController@index',
    'as' => 'products.index',
    'permission' => 'products',
    'menuItem' => ['icon' => 'md md-group', 'title' => 'Products']
]);
get('product/create', [
    'uses' => 'ProductsController@create',
    'as' => 'products.create',
    'permission' => 'products'
]);
post('product', [
    'uses' => 'ProductsController@store',
    'as' => 'product.store',
    'permission' => 'Users'
]);
get('product/{id}/edit', [
    'uses' => 'ProductsController@edit',
    'as' => 'products.edit',
    'permission' => 'products'
]);
put('product/{id}', [
    'uses' => 'ProductsController@update',
    'as'   => 'products.update',
    'permission' => 'products'
]);
post('product/{id}/delete', [
    'uses' => 'ProductsController@destroy',
    'as'   => 'products.destroy',
    'permission' => 'products'
]);
get('product/import', [
    'uses' => 'ProductsController@import',
    'as'   => 'products.import',
    'permission' => 'products'
]);
post('product/store_import', [
    'uses' => 'ProductsController@store_import',
    'as'   => 'products.store_import',
    'permission' => 'products'
]);
