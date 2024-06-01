<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/login','AdminLoginPage')->name('admin.login.page');
});
