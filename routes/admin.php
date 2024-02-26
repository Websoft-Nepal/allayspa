<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TermsConditionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ServiceController;
use App\Models\Gallery;

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

    // Privacy-policy
    Route::prefix('privacy-policy')->name('privacy.')->group(function (){
        Route::get('/',[PrivacyController::class,'index'])->name('index');
        Route::get('edit/{id}',[PrivacyController::class,'edit'])->name('edit');
        Route::put('update/{id}',[PrivacyController::class, 'update'])->name('update');
    });

    // Terms and Condition
    Route::prefix('terms-and-condition')->name('terms.')->group(function (){
        Route::get('/',[TermsConditionController::class,'index'])->name('index');
        Route::get('edit/{id}',[TermsConditionController::class,'edit'])->name('edit');
        Route::put('update/{id}',[TermsConditionController::class, 'update'])->name('update');
    });

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function (){
        Route::get('/',[GalleryController::class,'index'])->name('index');
        Route::post('store',[GalleryController::class,'store'])->name('store');
        Route::put('update/{id}',[GalleryController::class,'update'])->name('update');
        Route::delete('delete/{id}',[GalleryController::class,'destroy'])->name('destroy');
    });

    // Profile
    Route::prefix('profile')->name('profile.')->group(function (){
        Route::get('/',[ProfileController::class,'index'])->name('index');
        Route::put('update/{id}',[ProfileController::class,'update'])->name('update');
        Route::get('update-password/{id}',[ProfileController::class,'editPass'])->name('editpass');
        Route::put('update-password/{id}',[ProfileController::class,'updatePass'])->name('updatepass');
    });

    // Social Media
    Route::prefix('social-media')->name('social.')->group(function (){
        Route::get('/',[SocialMediaController::class,'index'])->name('index');
        Route::put('update/{id}',[SocialMediaController::class,'update'])->name('update');
    });

    // Contact
    Route::prefix('contact')->name('contact.')->group(function (){
        Route::get('/',[ContactController::class,'index'])->name('index');
        Route::put('update/{id}',[ContactController::class,'update'])->name('update');
    });

    // About Us page
    Route::prefix('aboutus')->name('aboutus.')->group(function (){
        Route::get('/',[AboutUsController::class,'index'])->name('index');
        Route::put('update/{id}',[AboutUsController::class,'update'])->name('update');
    });

    // Blog
    Route::prefix('blog')->name('blog.')->group(function (){
        Route::get('/',[BlogController::class,'index'])->name('index');
        Route::get('create',[BlogController::class,'create'])->name('create');
        Route::get('view/{id}',[BlogController::class,'view'])->name('view');
        Route::post('store',[BlogController::class,'store'])->name('store');
        Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
        Route::put('update/{id}',[BlogController::class,'update'])->name('update');
        Route::delete('delete/{id}',[BlogController::class,'destroy'])->name('destroy');
    });
});
