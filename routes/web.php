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
    return redirect()->route('claims.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('products',\App\Http\Controllers\ProductController::class);

Route::resource('claims',\App\Http\Controllers\ClaimlistController::class)
->middleware('auth');

Route::resource('warranties',\App\Http\Controllers\WarrantyController::class);
Route::get('warranties/{warranty}/claim/create',[\App\Http\Controllers\WarrantyController::class,'createClaim'])->name('warranties.claim.create');


Route::get('grouptelevision', [\App\Http\Controllers\ProductController::class,'grouptelevision'])->name('grouptelevision');

Route::get('groupspeaker', [\App\Http\Controllers\ProductController::class,'groupspeaker'])->name('groupspeaker');

Route::get('groupportair', [\App\Http\Controllers\ProductController::class,'groupportair'])->name('groupportair');

Route::get('groupcamera', [\App\Http\Controllers\ProductController::class,'groupcamera'])->name('groupcamera');

Route::get('officer', [\App\Http\Controllers\ClaimlistController::class,'officer'])->name('officer');

Route::get('check', [\App\Http\Controllers\WarrantyController::class,'check'])->name('check');

Route::resource('customers',\App\Http\Controllers\CustomerController::class);





require __DIR__.'/auth.php';
