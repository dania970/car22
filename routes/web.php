<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;


Route::post('/images', [ImageController::class, 'store'])->name('images.store');


Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
Route::post('/pricing', [PricingController::class, 'store'])->name('pricing.store');
Route::get('/car-singles/{id}', [CarController::class, 'show'])->name('car-singles.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/', [CarController::class, 'index'])->name('car.index');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/cars', [DashboardController::class, 'getCars'])->name('admin.cars');

Route::get('/admin/contacts', [DashboardController::class, 'getEmails'])->name('admin.contacts');

Route::post('/admin/emails/{id}', [DashboardController::class, 'deleteEmail'])->name('admin.contacts.delete');

// Route::delete('/admin/emails/{id}', [DashboardController::class, 'deleteEmail'])->name('admin.contacts.delete');


Route::get('/admin/cars/{id}/edit', [DashboardController::class, 'editCar'])->name('admin.edit-car');
Route::delete('/admin/cars/{id}', [DashboardController::class, 'deleteCar'])->name('admin.delete-car');

// Route::put('/admin/cars/{id}', [DashboardController::class, 'updateCar'])->name('admin.update-car');
Route::put('/admin/cars/{id}', [DashboardController::class, 'updateCar'])->name('admin.update-car');


Route::get('/admin/cars/add', [DashboardController::class, 'createCar'])->name('admin.add-car');
Route::post('/admin/cars/store', [DashboardController::class, 'storeCar'])->name('admin.store-car');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.add-category');
Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brand.store');
Route::get('/admin/category', [BrandController::class, 'index'])->name('admin.category');
Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brand.edit');
Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
Route::put('categories/{id}', [BrandController::class, 'update'])->name('admin.update-category');
