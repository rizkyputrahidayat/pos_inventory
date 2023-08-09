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

// Route::prefix('business')->group(function() {
//     Route::get('/', 'BusinessController@index');
// });
// use Modules\Business\Http\Controllers\BusinessController;


Route::group(['middleware' => 'auth'], function() {
    Route::resource('business', 'BusinessController')-> except('show');
});