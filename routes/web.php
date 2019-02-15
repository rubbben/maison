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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', 'FrontController@index');

Route::get('product/{id}','FrontController@show')->where(['id' => '[0-9]+']);

Route::get('soldes', 'FrontController@showProductBySoldes')->where(['code'=>'solde']);

Route::get('category/{id}', 'FrontController@productByCategory')->where(['id'=>'[0-9]+']); // route homme-femme


//Partie BACK
Route::get('/products/create', 'FrontController@productCreate');

Route::post('/products/store', 'FrontController@store');

Route::get('/admin', 'FrontController@admin')->name('admin');

Route::get('/products/edit/{id}', 'FrontController@productEdit'); //Modifier un produit

Route::put('/products/update/{id}', 'FrontController@update'); //Récupérer le produit modifié

Route::get('products/destroy/{id}', 'FrontController@destroy'); //Supprimer un produit

