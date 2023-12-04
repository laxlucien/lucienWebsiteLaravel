<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PagesController@index');

Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::get('/login', 'App\Http\Controllers\PagesController@login');

Route::get('/register', 'App\Http\Controllers\PagesController@register');

Route::get('/sudoku', 'App\Http\Controllers\PagesController@sudoku');


