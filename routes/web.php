<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroCRUDController;
use App\Http\Controllers\PrestamoCRUDController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros', [LibroCRUDController::class, 'index'])->name('libros.index');
Route::get('/libros/create', [LibroCRUDController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroCRUDController::class, 'store'])->name('libros.store');
Route::get('/libros/{libro}', [LibroCRUDController::class, 'show'])->name('libros.show');
Route::get('/libros/{libro}/edit', [LibroCRUDController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{libro}', [LibroCRUDController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LibroCRUDController::class, 'destroy'])->name('libros.destroy');

Route::get('/prestamos', [PrestamoCRUDController::class, 'index'])->name('prestamos.index');
Route::get('/prestamos/create', [PrestamoCRUDController::class, 'create'])->name('prestamos.create');
Route::post('/prestamos', [PrestamoCRUDController::class, 'store'])->name('prestamos.store');
Route::get('/prestamos/{prestamo}', [PrestamoCRUDController::class, 'show'])->name('prestamos.show');
Route::get('/prestamos/{prestamo}/edit', [PrestamoCRUDController::class, 'edit'])->name('prestamos.edit');
Route::put('/prestamos/{prestamo}', [PrestamoCRUDController::class, 'update'])->name('prestamos.update');
Route::delete('/prestamos/{prestamo}', [PrestamoCRUDController::class, 'destroy'])->name('prestamos.destroy');
