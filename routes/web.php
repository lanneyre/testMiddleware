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
    return view('welcome');
});
Route::get('/noaccess', function () {
    return view('noaccess');
});

Route::group(["middleware", ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboardSuper', function () {
        return view('dashboardSuper');
    })->name('dashboardSuper')->middleware('checkRole');
});


require __DIR__.'/auth.php';
