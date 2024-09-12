<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/form/create',[HomeController::class,'create'])->name('form.create');
Route::post('/form/create',[HomeController::class,'store'])->name('form.store');
Route::delete('/delete',[HomeController::class,'destroy'])->name('form.destroy');
Route::get('/form/{id}/edit',[HomeController::class,'edit'])->name('form.edit');
Route::put('/form/{id}',[HomeController::class,'update'])->name('form.update');

