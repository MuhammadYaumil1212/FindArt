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
    })->name('admin.dashboard')->middleware('CheckRole');

    Route::get('/admin/daftarArt', function() {
        return view('admin.daftarArt');
    })->name('admin.daftarArt')->middleware('CheckRole');

    Route::get('/admin/tambahLowongan', function() {
        return view('admin.tambahLowongan');
    })->name('admin.tambahLowongan')->middleware('CheckRole');

    Route::get('/admin/pengaturanAkun', function() {
        return view('admin.pengaturanAkun');
    })->name('admin.pengaturanAkun')->middleware('CheckRole');

    Route::get('/admin/ubahPassword', function() {
        return view('admin.ubahPassword');
    })->name('admin.ubahPassword')->middleware('CheckRole');

    Route::get('/admin/detailLowongan', function() {
        return view('admin.detailLowongan');
    })->name('admin.detailLowongan')->middleware('CheckRole');

    Route::get('/admin/updateLowongan', function() {
        return view('admin.updateLowongan');
    })->name('admin.updateLowongan')->middleware('CheckRole');

    //ARt routes
    Route::get('/art/dashboard', function(){
        return view('art.dashboard');
    })->name('art.dashboard');

    Route::get('/art/detailLowongan', function(){
        return view('art.detailLowongan');
    })->name('art.detailLowongan');

    Route::get('/art/daftarPekerjaan', function(){
        return view('art.daftarPekerjaan');
    })->name('art.daftarPekerjaan');

    Route::get('/art/pengaturanAkun', function(){
        return view('art.pengaturanAkun');
    })->name('art.pengaturanAkun');

    Route::get('/art/ubahPassword', function(){
        return view('art.ubahPassword');
    })->name('art.ubahPassword');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
