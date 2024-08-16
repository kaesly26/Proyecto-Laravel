<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personaController;

Route::get('/', homeController::class);

Route::resource('personas', personaController::class)->middleware('auth');

Route::get('admin/login', [adminController::class, 'showLoginForm'])->name('admin.show.login');
Route::get('admin/register',[adminController::class, 'showRegister'])->name('show.register');

Route::post('admin/login', [adminController::class, 'login'])->name('login');
Route::post('register', [adminController::class, 'validar'])->name('validar.register');

Route::get('logout', [adminController::class, 'logout'])->name('logout');

Route::get('pdf',[personaController::class, 'createPdf'])->name('pdf');

Route::get('UserPDF/{id}', [personaController::class, 'pdfUsuario'])->name('UserPdf');






