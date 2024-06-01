<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
    // return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin/logout','AdminLogout')->name('admin.logout');
    });

});
//end method

// Route::controller(AdminController::class)->group(function(){
//     Route::get('admin/login','AdminLoginPage')->name('admin.login.page');
// });
