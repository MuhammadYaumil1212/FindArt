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

//admin routes
Route::get('/admin/dashboard', function() {
    return view('dashboard');
})->name('admin.dashboard');

Route::get('/admin/daftarLowongan', function() {
    return "daftar Lowongan";
})->name('admin.daftarLowongan');

Route::get('/admin/daftarArt', function() {
    return "daftar ART";
})->name('admin.daftarArt');

//ARt routes
Route::get('/art/dashboard', function(){

});
