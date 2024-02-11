<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ServiceController;


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    // Service
    Route::prefix('service')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ServiceController::class, 'destroy'])->name('destroy');
    });

});
