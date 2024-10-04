<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// user
Route::get('/home',[ManagementController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[ManagementController::class,'index'])->name('index');
Route::get('/about',[ManagementController::class,'about'])->name('about');
Route::get('/doctor',[ManagementController::class, 'doctor'])->name('doctor');
Route::get('/treatments',[ManagementController::class, 'treatments'])->name('treatments');
Route::get('/blog',[ManagementController::class, 'blog'])->name('blog');
Route::get('/contact',[ManagementController::class, 'contact'])->name('contact');
Route::get('/appoinment',[ManagementController::class, 'appoinment'])->name('appoinment');
Route::post('/book_appoinment',[ManagementController::class, 'book_appoinment'])->name('book_appoinment');
Route::get('/myappoinment',[ManagementController::class, 'myappoinment'])->name('myappoinment');
Route::get('/delete_appointment/{id}',[ManagementController::class, 'delete_appointment'])->name('delete_appointment');

// admin
Route::get('/add_doctor',[AdminController::class,'add_view']);
Route::post('/upload_doctor',[AdminController::class,'upload']);
Route::get('/show_appointment',[AdminController::class,'show_appointment']);
Route::get('/all_doctor',[AdminController::class,'all_doctor']);
Route::get('/delete_doctor/{id}',[AdminController::class,'delete_doctor']);
Route::get('/update_doctor/{id}',[AdminController::class,'update_doctor']);
Route::post('/edit_doctor/{id}',[AdminController::class,'edit_doctor'])->name('edit_doctor');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
