<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});

// Items APIs
Route::get('items', [ItemController::class, 'get']);


// Route::post('items', 'ItemController@store');
    
// Route::get('items', 'ItemController@get');

// Route::delete('items/{id}', 'ItemController@delete');
