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
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/daftarLowongan', function() {
        return "daftar Lowongan";
    })->name('admin.daftarLowongan');

    Route::get('/admin/daftarArt', function() {
        return view('admin.daftarArt');
    })->name('admin.daftarArt');

    Route::get('/admin/tambahLowongan', function() {
        return view('admin.tambahLowongan');
    })->name('admin.tambahJob');

    Route::get('/admin/pengaturanAkun', function() {
        return view('admin.pengaturanAkun');
    })->name('admin.pengaturanAkun');

    Route::get('/admin/ubahPassword', function() {
        return view('admin.ubahPassword');
    })->name('admin.ubahPassword');

    Route::get('/admin/detailLowongan', function() {
        return view('admin.detailLowongan');
    })->name('admin.detailLowongan');

    Route::get('/admin/updateLowongan', function() {
        return view('admin.updateLowongan');
    })->name('admin.updateLowongan');
    //ARt routes
    Route::get('/art/dashboard', function(){
        
    });
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
