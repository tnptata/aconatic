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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products',\App\Http\Controllers\ProductController::class);

Route::resource('claims',\App\Http\Controllers\ClaimlistController::class)
->middleware('auth');

Route::resource('warranties',\App\Http\Controllers\WarrantyController::class);
Route::get('warranties/{warranty}/claim/create',[\App\Http\Controllers\WarrantyController::class,'createClaim'])->name('warranties.claim.create');
Route::get('home', [\App\Http\Controllers\ProductController::class,'home'])->name('home');

Route::get('indexcustomer', [\App\Http\Controllers\ProductController::class,'indexcustomer'])->name('indexcustomer');

Route::get('grouptelevision', [\App\Http\Controllers\ProductController::class,'grouptelevision'])->name('grouptelevision');

Route::get('groupspeaker', [\App\Http\Controllers\ProductController::class,'groupspeaker'])->name('groupspeaker');

Route::get('groupportair', [\App\Http\Controllers\ProductController::class,'groupportair'])->name('groupportair');

Route::get('groupcamera', [\App\Http\Controllers\ProductController::class,'groupcamera'])->name('groupcamera');

Route::get('showproduct', [\App\Http\Controllers\ProductController::class,'showproduct'])->name('showproduct');
Route::get('products/buy/{product}', [\App\Http\Controllers\ProductController::class,'buy'])->name('products.buy');
Route::get('products/confirm/{product}/{cost}', [\App\Http\Controllers\ProductController::class,'confirm'])->name('products.confirm');
Route::get('officer', [\App\Http\Controllers\ClaimlistController::class,'officer'])->name('officer');

Route::get('check', [\App\Http\Controllers\WarrantyController::class,'check'])->name('check');

Route::get('addMoney', [\App\Http\Controllers\UserController::class,'addMoney'])->name('addMoney');

Route::resource('buylists',\App\Http\Controllers\BuylistController::class);
Route::get('buylists/deliver/{buylist}', [\App\Http\Controllers\BuylistController::class,'deliver'])->name('buylists.deliver');
Route::get('deliver/history', [\App\Http\Controllers\BuylistController::class,'history'])->name('buylists.history');

Route::post('updateMoney/{id}', [\App\Http\Controllers\UserController::class,'updateMoney'])->name('updateMoney');

Route::post('deniedMoney/{id}', [\App\Http\Controllers\UserController::class,'deniedMoney'])->name('deniedMoney');

Route::get('money', [\App\Http\Controllers\UserController::class,'money'])->name('money');

Route::get('adminMoney', [\App\Http\Controllers\UserController::class,'adminMoney'])->name('adminMoney');


require __DIR__.'/auth.php';
