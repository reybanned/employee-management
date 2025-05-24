<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/employees/summary', [EmployeeController::class, 'summary'])->name('employees.summary');
    Route::resource('employees', EmployeeController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});