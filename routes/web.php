<?php

use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('/books',BookController::class);
// Cart endpoints

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/cart/add/{id}',[CartController::class,'add'])->name('cart.add');
Route::get('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->middleware('auth')->name('checkout.store');


Route::get('/checkout/thankyou', function() {
    return view('checkout.thankyou');
})->name('checkout.thankyou');
Route::get('/', function () {
    return view('landing');
})->name('/');
// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// لوحة تحكم المشرف (Admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/books', AdminBookController::class);
    Route::resource('/users', AdminUserController::class);
});

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::post('/books/{book}/rate', [BookController::class, 'rate'])->name('books.rate');
