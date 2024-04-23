<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/management', function () {
    return view('management.index');
});

Route::get('/management/books', function () {
    return view('management.books.index');
});

Route::prefix('management/categories')->name('management.categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index'); // lists all categories
    Route::get('/create', [CategoryController::class, 'create'])->name('create'); // shows form to create a new category
    Route::post('/', [CategoryController::class, 'store'])->name('store'); // stores new category
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); // shows edit form
    Route::put('/{category}', [CategoryController::class, 'update'])->name('update'); // updates a category
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy'); // deletes a category
});
