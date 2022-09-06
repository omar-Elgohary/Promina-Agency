<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\AlbumController;
use  App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Albums
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/edit/{id}', [AlbumController::class, 'edit'])->name('albums.edit');
Route::post('/albums/update/{id}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/delete/{id}', [AlbumController::class, 'delete'])->name('albums.delete');



// Images
Route::get('/images', [ImageController::class, 'index'])->name('images.index');
Route::get('/images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('/images/store', [ImageController::class, 'store'])->name('images.store');
Route::get('/images/edit/{id}', [ImageController::class, 'edit'])->name('images.edit');
Route::post('/images/update/{id}', [ImageController::class, 'update'])->name('images.update');
Route::delete('/images/delete/{id}', [ImageController::class, 'delete'])->name('images.delete');

// MoveShow
Route::get('/images/MoveShow', [ImageController::class, 'MoveShow'])->name('images.MoveShow');
Route::get('/images/delete/all', [ImageController::class, 'deleteAllImages'])->name('images.delete.all');

// Archive
Route::get('/images/restore/{id}', [ImageController::class, 'ImageRestore'])->name('images.restore');
Route::delete('/images/forceDelete/{id}', [ImageController::class, 'forceDelete'])->name('images.forceDelete');
