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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('about', function () {
    return view('about');
});
*/

Route::view('/','welcome');
Route::view('about','about');
Route::view('contact','contact');
Route::get('customer', 'CustomersController@lists');
Route::get('todo', 'TodoController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('post_customer','CustomersController@addcustomer');
Route::post('todo_post','TodoController@store');

Route::post('post_category','CategoryController@create');
Route::get('todo/{todo}','TodoController@show');

Auth::routes();
Route::get('load_view','LastTodoController@load_view');
