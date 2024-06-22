<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/regist', [AuthController::class, 'store'])->name('regist')->middleware('guest');

Route::get('/riwayat', [HomeController::class, 'riwayat'])->middleware('auth');
Route::get('/perbaikan', [HomeController::class, 'perbaikan'])->middleware('auth');
Route::get('/edit/{id}', [HomeController::class, 'editRequest'])->middleware('auth');
Route::post('/pengajuan/{id}', [HomeController::class, 'updatePerbaikan'])->middleware('auth');
Route::post('/pengajuan', [HomeController::class, 'storeRequest'])->middleware('auth');