<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ProductController::class,'index'])->name('products.index');

Route::get('products/create',[ProductController::class,'create'])->name('porducts.create');

Route::post('products/store',[ProductController::class,'store'])->name('porducts.store');

Route::get('products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');

Route::put('products/{id}/update',[ProductController::class,'update'])->name('products.update');

Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/products/{id}/show',[ProductController::class,'show'])->name('products.show');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
