<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

// Route::get(uri: '/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class , 'welcome'])->name('welcome');

// Route::get('/note', [NotesController::class, 'index'])->name('notes.index');
// Route::get('/note/create', [NotesController::class,'create'])->name('notes.create');
// Route::post('/note', [NotesController::class,'store'])->name('notes.store');
// Route::get( '/note/{id}', [NotesController::class,'show'])->name('notes.show');
// Route::get('/note/{id}/edit', [NotesController::class,'edit'])->name('notes.edit');
// Route::put('/note/{id}', [NotesController::class,'update'])->name('notes.update');
// Route::delete('/note/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');

Route::resource('notes', NotesController::class);
