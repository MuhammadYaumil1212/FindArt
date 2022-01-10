<?php

use App\Http\Controllers\FinderController;
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
    Route::get('/dashboard',[FinderController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/tambahLowongan', [FinderController::class,'create'])->name('admin.tambahLowongan');
    Route::post('/admin/tambahLowongan', [FinderController::class,'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [FinderController::class,'edit'])->name('admin.edit');
    Route::get('/admin/{id}/detail', [FinderController::class,'show'])->name('admin.detail');
    Route::delete('/admin/{id}/delete', [FinderController::class,'destroy'])->name('admin.destroy');
    Route::put('/admin/{id}/update',[FinderController::class,'update'])->name('admin.update');
    
    Route::get('/admin/daftarArt', function() {
        return view('admin.daftarArt');
    })->name('admin.daftarArt');


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
require __DIR__.'/auth.php';
