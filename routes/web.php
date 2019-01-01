<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [
    'uses' => 'ProductController@getProducts',
    'as' => 'product.index'
]);

Route::get('/categories', [
    'uses' => 'CategoryController@index',
    'as' => 'category.index'
]);


Route::group(['middleware' => 'is_admin'], function() {

    Route::get('/orders', [
        'uses' => 'OrderController@getOrders',
        'as' => 'order.index'
    ]);

    Route::get('/create-category',[
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::post('/create-category', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::delete('/category/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.destroy'
    ]);
});

Route::get('/category/get-products/{id}', [
    'uses' => 'CategoryController@getProducts',
    'as' => 'category.products'
]);


Route::group(['middleware' => 'auth'], function() {

    Route::get('/add-to-cart/{id}', [
        'uses' => 'ProductController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

    Route::post('/checkout', [
        'uses' => 'ProductController@postCheckout',
        'as' => 'checkout'
    ]);

    Route::get('/checkout', [
        'uses' => 'ProductController@getCheckout',
        'as' => 'checkout'
    ]);

    Route::get('/removeFromCart/{id}/{quantity}', [
        'uses' => 'ProductController@removeFromCart',
        'as' => 'product.removeFromCart'
    ]);

    Route::get('/shoppingCart', [
        'uses' => 'ProductController@getShoppingCart',
        'as' => 'product.shoppingCart'
    ]);

});


Route::group(['prefix' => 'product'], function() {

    Route::group(['middleware' => 'is_admin'], function() {

        Route::delete('/{id}', [
            'uses' => 'ProductController@destroy',
            'as' => 'product.destroy'
        ]);

        Route::get('/newproduct', [
            'uses' => 'ProductController@newProduct',
            'as' => 'product.new'
        ]);

        Route::post('/newproduct', [
            'uses' => 'ProductController@createProduct',
            'as' => 'product.new'
        ]);

    });
});


Route::group(['prefix' => 'user'], function() {

    Route::group(['middleware' => 'guest' ], function() {

        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.sigin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);

    });

    Route::get('/profile/{id}', [
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile',
        'middleware' => 'auth'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);
});
