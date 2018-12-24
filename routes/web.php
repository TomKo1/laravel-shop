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

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/removeFromCart/{id}/{quantity}', [
    'uses' => 'ProductController@removeFromCart',
    'as' => 'product.removeFromCart'
]);

Route::get('/shoppingCart', [
    'uses' => 'ProductController@getShoppingCart',
    'as' => 'product.shoppingCart'
]);

Route::group(['prefix' => 'product'], function() {

    Route::group(['middleware' => 'auth'], function() {

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
