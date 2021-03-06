<?php

use App\Http\Controllers\ArtController;
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
Route::middleware(['auth','role:0'])->group(function(){
    Route::get('/dashboard',[FinderController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/tambahLowongan', [FinderController::class,'create'])->name('admin.tambahLowongan');
    Route::post('/admin/tambahLowongan', [FinderController::class,'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [FinderController::class,'edit'])->name('admin.edit');
    Route::get('/admin/{id}/detail', [FinderController::class,'show'])->name('admin.detail');
    Route::delete('/admin/{id}/delete', [FinderController::class,'destroy'])->name('admin.destroy');
    Route::put('/admin/{id}/update',[FinderController::class,'update'])->name('admin.update');
    Route::get('/admin/interested',[FinderController::class,'interested'])->name('admin.interested');
    Route::get('/admin/rating',[FinderController::class,'rating'])->name('admin.rating');
    Route::get('/admin/daftarArt', [FinderController::class,'listArt'])->name('admin.daftarArt');
    Route::Put('/admin/{id}/updateJobStatus', [FinderController::class,'updateJob'])->name('admin.updateJobStatus');
    Route::Put('/admin/{id}/hireJobStatus', [FinderController::class,'hireJob'])->name('admin.hireJobStatus');
    Route::Put('/admin/{id}/rejectJobStatus', [FinderController::class,'rejectJob'])->name('admin.rejectJobStatus');
    Route::get('/admin/GiveRating',[FinderController::class,'giveRate'])->name('admin.addRating');
    Route::Put('/admin/{id}/storeRating', [FinderController::class,'storeRating'])->name('admin.storeRating');
    // Setting akun
    Route::get('/admin/pengaturanAkun', function() {
        return view('admin.pengaturanAkun');
    })->name('admin.pengaturanAkun');

    Route::get('/admin/ubahPassword', function() {
        return view('admin.ubahPassword');
    })->name('admin.ubahPassword');
});
Route::middleware(['auth','role:1'])->group(function(){
    //ARt routes
    Route::get('/art/dashboard', [ArtController::class,'index'])->name('art.dashboard');
    Route::get('/art/{id}/detailLowongan',[ArtController::class,'show'])->name('art.lamar');
    Route::post('/art/{id}/apply',[ArtController::class,'apply'])->name('art.apply');
    Route::get('/art/daftarPekerjaan',[ArtController::class,'daftarPekerjaan'])->name('art.daftarPekerjaan');

    Route::get('/art/pengaturanAkun', function(){
        return view('art.pengaturanAkun');
    })->name('art.pengaturanAkun');
    
    Route::get('/art/ubahPassword', function(){
        return view('art.ubahPassword');
    })->name('art.ubahPassword');
});
require __DIR__.'/auth.php';
