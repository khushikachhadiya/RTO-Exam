<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionbankController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Examcontroller;




 
Route::controller(Examcontroller::class)->group(function () {
    Route::get('/exam','view')->name('exam');
    
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home','view' )->name('home');
    
});
Route::controller(  QuestionbankController::class)->group(function () {
    Route::get('/questionbank','view' )->name('questionbank');
    
});
Route::controller(SettingController::class)->group(function () {
    Route::get('/setting' ,'view' )->name('setting');
    
});