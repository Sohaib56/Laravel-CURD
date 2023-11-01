<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use Spatie\Permission\Middlewares\PermissionMiddleware;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');








Route::middleware(['auth', RoleMiddleware::class . ':admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('/roles',RoleController::class);

    Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('roles.permissions');

    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions',PermissionController::class);

    Route::post('/permissions/{permission}/roles',[PermissionController::class,'giveRole'])->name('permissions.roles');

    Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class,'revokeRole'])->name('permissions.roles.revoke');
    
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    
    Route::get('/users/{user}/products', [UserController::class, 'showproducts'])->name('users.showproducts');
    
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    
    Route::post('/users/{user}/roles',[UserController::class,'giveRole'])->name('users.roles');
    
    Route::delete('/users/{user}/roles/{role}',[UserController::class,'revokeRole'])->name('users.roles.revoke');
    
    Route::post('/users/{user}/permissions',[UserController::class,'givePermission'])->name('users.permissions');
    
    Route::delete('/users/{user}/permissions/{permission}',[UserController::class,'revokePermission'])->name('users.permissions.revoke');
});








Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/index', [ProductController::class, 'index'])->name('products.index');

    Route::get('products/create', [ProductController::class, 'create'])->name('products.create')->middleware('permission:create');

    Route::post('products/store',[ProductController::class,'store'])->name('products.store');
    
    Route::get('products/{id}/edit',[ProductController::class,'edit'])->name('products.edit')->middleware('permission:edit');
   
    Route::put('products/{id}/update',[ProductController::class,'update'])->name('products.update');
    
    Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
    
    Route::get('/products/{id}/show',[ProductController::class,'show'])->name('products.show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});    




require __DIR__.'/auth.php';

    