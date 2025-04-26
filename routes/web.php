<?php

use App\Http\Controllers\CampingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('penyewaan', [CampingController::class,'index'])->name('penyewaan.index');
Route::get('penyewaan/create', [CampingController::class,'create'])->name('penyewaan.create');
Route::post('penyewaan', [CampingController::class,'store'])->name('penyewaan.store');
Route::get('penyewaan/{id}/edit', [CampingController::class,'edit'])->name('penyewaan.edit');
Route::put('penyewaan/{id}', [CampingController::class,'update'])->name('penyewaan.update');
Route::delete('penyewaan/{id}', [CampingController::class,'destroy'])->name('penyewaan.destroy');

Route::get('penyewaan/trash', [CampingController::class, 'trash'])->name('penyewaan.trash');
Route::post('penyewaan/{id}/restore', [CampingController::class, 'restore'])->name('penyewaan.restore');
Route::delete('penyewaan/{id}/forceDelete', [CampingController::class, 'forceDelete'])->name('penyewaan.forceDelete');
