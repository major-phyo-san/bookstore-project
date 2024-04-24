<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\GenresController;
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

Route::get('/management/sub-categories', function () {
    return view('management.sub-categories.index');
});

Route::get('/management/books', function () {
    return view('management.books.index');
});


Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('subcategories')->name('subcategories.')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('index');
        Route::post('/', [SubCategoryController::class, 'store'])->name('store');
        Route::put('/{subCategory}', [SubCategoryController::class, 'update'])->name('update');
        Route::delete('/{subCategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('management')->name('management.')->group(function () {
    Route::prefix('genres')->name('genres.')->group(function () {
        Route::get('/', [GenresController::class, 'index'])->name('index');
        Route::post('/', [GenresController::class, 'store'])->name('store');
        Route::put('/{category}', [GenresController::class, 'update'])->name('update');
        Route::delete('/{category}', [GenresController::class, 'destroy'])->name('destroy');
    });
});
