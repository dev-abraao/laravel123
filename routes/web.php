<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/notes')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function (){
    // Route::get('/note', [NotesController::class, 'index'])->name('notes.index');
// Route::get('/note/create', [NotesController::class,'create'])->name('notes.create');
// Route::post('/note', [NotesController::class,'store'])->name('notes.store');
// Route::get( '/note/{id}', [NotesController::class,'show'])->name('notes.show');
// Route::get('/note/{id}/edit', [NotesController::class,'edit'])->name('notes.edit');
// Route::put('/note/{id}', [NotesController::class,'update'])->name('notes.update');
// Route::delete('/note/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');

Route::resource('notes', NotesController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
