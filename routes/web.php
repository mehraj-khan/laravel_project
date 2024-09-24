<?php

use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ManagementController::class,'index'])->name('index');
Route::get('/about',[ManagementController::class,'about'])->name('about');
Route::get('/doctor',[ManagementController::class, 'doctor'])->name('doctor');
Route::get('/treatments',[ManagementController::class, 'treatments'])->name('treatments');
Route::get('/blog',[ManagementController::class, 'blog'])->name('blog');
Route::get('/contact',[ManagementController::class, 'contact'])->name('contact');

Route::get('/home',[ManagementController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
