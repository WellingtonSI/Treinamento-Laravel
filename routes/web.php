<?php

use App\ProdutoEstoque;
use Illuminate\Support\Facades\Route;

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



Route::resource('estoque', 'EstoqueController');
Route::resource('produto-estoque', 'ProdutoEstoqueController');
// Route::group(['prefix' => 'produto-estoque'], function () {
//     Route::get('/show','ProdutoEstoqueController@show');
// });