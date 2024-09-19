<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TagsController;

Route::get('/', function () {
    return view('home.home');
});



Route::get('/admin', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// profile
Route::get('/profile/edit', [UserController::class, 'profile_edit'])->name('edit.profile');
Route::post('/profile/update', [UserController::class, 'profile_update'])->name('update.profile');
Route::post('/password/update', [UserController::class, 'password_update'])->name('update.password');
Route::post('/photo/update', [UserController::class, 'photo_update'])->name('update.photo');
Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/user/delete/{user_id}', [UserController::class, 'user_delete'])->name('user.delete');
Route::post('/user/add', [UserController::class, 'user_add'])->name('user.add');

// category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/category/add', [CategoryController::class, 'category_add'])->name('category.add');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::get('/category/trash', [CategoryController::class, 'category_trash'])->name('category.trash');
Route::get('/category/restore/{trash_id}', [CategoryController::class, 'category_restore'])->name('category.restore');
Route::get('/hard/delete/{trash_id}', [CategoryController::class, 'category_hard_delete'])->name('category.hard');
Route::post('/check/delete', [CategoryController::class, 'check_delete'])->name('check.delete');
// Auth

Route::get('/singup', [AuthorController::class, 'singup'])->name('singup');
Route::get('/singin', [AuthorController::class, 'singin'])->name('singin');
Route::post('/auth/store', [AuthorController::class, 'auth_store'])->name('auth.store');
Route::post('/auth/singin', [AuthorController::class, 'auth_singin'])->name('auth.singin');

// tags
Route::get('/tags', [TagsController::class, 'tags'])->name('tags');
Route::post('/tags/add', [TagsController::class, 'tags_add'])->name('tags.add');
Route::get('/tag/delete/{tag_id}', [TagsController::class, 'tag_delete'])->name('tag.delete');
Route::get('/authors', [AuthorController::class, 'authors'])->name('authors');
Route::get('/authors/logout', [AuthorController::class, 'authors_logout'])->name('authors.logout');

Route::get('/authors/status/{author_id}', [AuthorController::class, 'authors_status'])->name('authors.status');
Route::get('/author/dashboard',[AuthorController::class,'author_dashboard'])->name('author.dash');


