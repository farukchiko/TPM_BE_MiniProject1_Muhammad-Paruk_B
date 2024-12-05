<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
Route::resource('events', EventController::class);
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/', function () {
    return view('welcome');
});
