<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\UserController;

//  User routes :
Route::view('/', 'homepage');/*->name('homepage') and use {{route('homepage')}}; */
Route::get('/about', [UserController::class, 'about']);

//Admin routes :
Route::view('/loginAdmin', 'admin')->name('login');
Route::post('/loginAdmin', [AdminController::class, 'adminLogin']);
Route::post('/adminLogout', [AdminController::class, 'adminLogout']);

//offres routes :
Route::get('/offres', [OffresController::class, 'offres']);
Route::post('/offres', [OffresController::class, 'publierOffre'])->middleware('auth');
Route::get('/pdfDownload{pdf}', [OffresController::class, 'pdfDownload'])->name('pdf.download');
Route::get('/formulairOffre', [OffresController::class, 'formulair'])->middleware('auth');
Route::get('/edit/{offre}', [OffresController::class, 'edit_offre'])->name('edit_offre')->middleware('auth');
Route::put('/edit/{offre}', [OffresController::class, 'update_offre'])->middleware('auth');
Route::delete('/delete/{offre}', [OffresController::class, 'delete_offre'])->name('delete_offre');

