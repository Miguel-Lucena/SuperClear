<?php

//use Illuminate\Support\Facades\Route; lo tenia pero lo saque

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

//FUNCIONES DE DEPENDENCIA PARA EL CARRITO DE COMPRA
//Route::bind('product', function($slug){
  //  return App\Product::where('slug', $slug)->first();
//});

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home/{id}', 'HomeController@show');
Route::get('/home/product/{id}', 'HomeController@productshow');


//esta la saque de otro lado Route::get('/admin', 'AdminController@index');
Route::get('admin', 'AdminController@index');
Route::resource('users', 'UsersController');
Route::resource('rubros', 'RubrosController');
Route::resource('products', 'ProductsController');
Route::resource('orders', 'OrderController');
//Route::resource('orderitems', 'OrderItemController');
Route::get('/orderitems/{order}', 'OrderItemController@show');
//carrito de compra
//Route::resource('cart', 'CartController');
Route::get('cart/show', 'CartController@show');
Route::get('cart/store/{product}', 'CartController@store');
Route::get('cart/destroy/{product}', 'CartController@destroy');
Route::get('cart/trash', 'CartController@trash');
Route::get('cart/update/{product}/{quantity}', 'CartController@update');
Route::get('cart/detail_orders', ['middleware'=>'auth', 'uses'=> 'CartController@orderDetail']);
Route::get('cart/detail_orders/pago', ['middleware'=>'auth', 'uses'=> 'CartController@registerPago']);
Route::get('/cart/detail_orders/pdf', ['middleware'=>'auth', 'uses'=> 'CartController@showpdf']);
//Route::get('cart/detail_orders', 'CartController@orderDetail');
//todo es para el post
//Route::get('/posts', 'PostsController@index');
//Route::get('/posts/create', 'PostsController@create');
//Route::get('/posts/{post}', 'PostsController@show');
//Route::post('/posts', 'PostsController@store');
//Route::get('/posts/{post}/edit', 'PostsController@edit');
//Route::patch('/posts/{post}', 'PostsController@update');
//Route::delete('/posts/{post}', 'PostsController@destroy');

//fin de las rutas para el post

//las de abajo estan por las dudas estaban en el otro
