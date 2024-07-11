<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/notes', [PagesController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [PagesController::class, 'create'])->name('notes.create');
Route::post('/notes', [PagesController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}', [PagesController::class, 'show'])->name('notes.show');
Route::get('/notes/{id}/edit', [PagesController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{id}', [PagesController::class, 'update'])->name('notes.update');
Route::delete('/notes/{id}', [PagesController::class, 'destroy'])->name('notes.destroy');
