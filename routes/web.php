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

//routes for the games on the website
Route::get('/sudoku', 'App\Http\Controllers\PagesController@sudoku');
Route::get('/fight', 'App\Http\Controllers\PagesController@fightingGame');

Route::get('/loginError', 'App\Http\Controllers\PagesController@loginError');

Route::get('/profile', 'App\Http\Controllers\PagesController@profile');

//routes for the photo specific function calls
Route::get('/photoWall', [App\Http\Controllers\PagesController::class, 'photoHome']);

//for the user to update their information
Route::get('/changeUserInfo/{id}', [App\Http\Controllers\PagesController::class, 'editUser']);
Route::get('/updateUserProfile/{id}', [App\Http\Controllers\PagesController::class, 'updateUser']);
Route::get('/updateUserPassword/{id}', [App\Http\Controllers\PagesController::class, 'updatePassword']);
Route::get('/saveUserPassword/{id}', [App\Http\Controllers\PagesController::class, 'savePassword']);

//for the register user data
Route::post('storeUser', 'App\Http\Controllers\PagesController@store');

//to log in on the user data
Route::post('authentificateUser', 'App\Http\Controllers\PagesController@checkValid');
Route::post('logout', 'App\Http\Controllers\PagesController@logout');

//these routes are going to be for the images, such as refrencing and accessing...
Route::get('/addToPhotoWall/{id}', [App\Http\Controllers\PhotoController::class, 'uploadPhoto']);