<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PowerCloudRest;
use App\Http\Controllers\PowerCloudSoap;

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

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/pctest', function () {
    return view('welcome'); 
});

// Route::get('/', function () {
//     return view('ftp.index');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); 


Route::controller(PowerCloudRest::class)->group(function () {
    Route::get('/getContract', 'test')->name('getContract'); 
    Route::get('/orderTest', 'newOrderTest')->name('newOrderTest'); 
});

Route::controller(PowerCloudSoap::class)->group(function () {
    Route::get('/getTariffs', 'getTariffs')->name('getTariffs');  
    Route::get('/getInfo/{zip}/{usage?}/{business?}', 'getInfo')->name('getInfo');  
});