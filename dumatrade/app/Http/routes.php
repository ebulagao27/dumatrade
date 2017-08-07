<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','MainController@index');

Route::get('addproduct','ProductController@index');
Route::post('addproduct', 'ProductController@storeProduct');

Route::get('listproduct', 'ProductController@listProducts');
Route::get('listproduct/cat/{id}', 'ProductController@listByCat');
Route::get('viewproduct/{id}' ,'ProductController@viewProduct');

Route::get('viewproduct/{id}' ,'ProductController@viewProduct');

Route::get('shoppingcart' ,'CartController@index');

Route::get('pendingpurchases' ,'NegotiationController@listPending');
Route::get('deleterequest/{id}' , 'NegotiationController@deleteRequest');

Route::get('negotiate/{id}', 'NegotiationController@index');
Route::post('negotiate/{id}', 'NegotiationController@save');

Route::get('requests', 'NegotiationController@listRequests');
Route::get('reject/{id}', 'NegotiationController@rejectRequest');
Route::get('approve/{id}', 'NegotiationController@approveRequest');

Route::get('editproduct/{id}','ProductController@editProduct');
Route::post('editproduct', 'ProductController@saveEdit');

Route::get('delete/{id}', 'ProductController@deleteProduct');

Route::get('profile', 'AuthController@callProfile');

Route::get('login', 'AuthController@index');
Route::post('login', 'AuthController@authenticate');

Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@register');

Route::get('logout', function(){
    Auth::logout();
    return Redirect::to('/');
});
