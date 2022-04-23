<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 
Route::group(['namespace'=>'frontend'], function(){
    Route::get('/','HomeController@index')->name('frontend.home.index');
});

//Backend
Route::group(['namespace'=>'backend', 'prefix' => 'admin','middleware' => 'auth:sanctum', 'verified'], function(){
    Route::get('/','DashboardController@index')->name('backend.index');

});

// Route::controller(backend\DashboardController::class)->group(function(){
//     Route::get('/dashboard1', 'index');
// });