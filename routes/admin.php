<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pos\SupplierController;


require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){
    Route::get('admin/login','AdminLoginPage')->name('admin.login.page');
    Route::get('admin/profile','LoadProfileView')->name('admin.profile');
   
});

Route::controller(ProfileController::class)->group(function(){
     Route::post('admin/update/profile','UpdateProfile')->name('update.profile');
     Route::post('admin/update/password','UpdatePassword')->name('admin.update.password');
});


Route::middleware('auth')->group(function(){
    Route::controller(SupplierController::class)->group(function(){

        Route::get('supplier/all','SupplierAll')->name('supplier.all');
        Route::get('supplier/add','SupplierAdd')->name('supplier.add');
        Route::post('suppler/store','store')->name('supplier.store');

    });

});