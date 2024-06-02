<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/login','AdminLoginPage')->name('admin.login.page');
    Route::get('admin/profile','LoadProfileView')->name('admin.profile');
   
});

Route::controller(ProfileController::class)->group(function(){
     Route::post('admin/update/profile','UpdateProfile')->name('update.profile');
     Route::post('admin/update/password','UpdatePassword')->name('admin.update.password');
});