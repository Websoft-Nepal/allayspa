<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CounterController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\PrivacyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\TermsConditionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services-categories', [ServiceController::class, 'index']);
Route::get('/gallery',[GalleryController::class,'index']);
Route::get('/aboutus',[AboutUsController::class,'index']);
Route::get('/blog',[BlogController::class,'index']);
Route::get("/privacy",[PrivacyController::class,'index']);
Route::get('/contact',[ContactController::class,'index']);
Route::get('social-media',[SocialMediaController::class,'index']);
Route::get('/terms-condition',[TermsConditionController::class,'index']);
Route::post('/contactus',[ContactUsController::class,'store']);
Route::get('/counter',[CounterController::class,'index']);
