<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoriaController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personaController;
use App\Http\Controllers\principalController;
use App\Models\Categoria;

Route::get('/', homeController::class);

Route::get('principal',[principalController::class, 'ingresar'])->name('principal')->middleware('auth');

Route::get('categoria', [categoriaController::class, 'crearCategoria'])->name('categoria');
Route::post('categoria', [categoriaController::class, 'guardarCategoria'])->name('guardar');
Route::get('lista', [categoriaController::class, 'showCategory'])->name('lista');

Route::get('productos', [principalController::class, 'crearProductos'])->name('crearProducto');
Route::post('productos', [principalController::class, 'guardarProducto'])->name('guardarProducto');


Route::resource('personas', personaController::class);

Route::get('admin/login', [adminController::class, 'showLoginForm'])->name('admin.show.login');
Route::get('admin/register',[adminController::class, 'showRegister'])->name('show.register');

Route::post('admin/login', [adminController::class, 'login'])->name('login');
Route::post('register', [adminController::class, 'validar'])->name('validar.register');

Route::get('logout', [adminController::class, 'logout'])->name('logout');

Route::get('pdf',[personaController::class, 'createPdf'])->name('pdf');

Route::get('UserPDF/{id}', [personaController::class, 'pdfUsuario'])->name('UserPdf');






