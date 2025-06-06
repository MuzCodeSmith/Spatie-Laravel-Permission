<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth',])->name('dashboard');

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::resource('/roles',RoleController::class);
    Route::resource('/permissions',PermissionController::class);
});

Route::get('/admin', function () {
    return view('admin.index');})->middleware(['auth','role:admin'])->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
