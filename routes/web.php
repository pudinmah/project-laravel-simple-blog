<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\HomepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::controller(AdminController::class)->middleware('auth')->group(function () {

    Route::get('/create_artikel', 'create_artikel')->name('create_artikel');

    Route::post('/add_post', 'add_post')->name('add_post');

    Route::get('/show_post', 'show_post')->name('show_post');

    Route::get('/edit_post/{id}', 'edit_post')->name('edit_post');

    Route::get('/delete_post/{id}', 'delete_post')->name('delete_post');

    Route::post('/update_post/{id}', 'update_post')->name('update_post');
});


Route::get('/blog_detail/{id}', [HomepageController::class, 'BlogDetail'])->name('blog.detail');
