<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComentsController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PagesController::class,'index'])->name('home');
Route::post('/blog/{id}/like', [BlogController::class,'like'])->name('blog.like');
Route::post('/blog/{id}/unlike', [BlogController::class,'unlike'])->name('blog.unlike');
Route::resource('/blog', BlogController::class);
Route::resource('/profile', ProfileController::class);
Auth::routes();
Route::post('/add_coment',[ComentsController::class,'Add'])->name('AddComent');
Route::post('/delete_coment',[ComentsController::class,'delete'])->name('deletecoment');


