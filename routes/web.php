<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\EventsController;


Route::middleware(['LangTradMiddleware'])->group(function () {

    //  User routes :
    // Route::view('/', 'homepage');/*->name('homepage') and use {{route('homepage')}}; */
    Route::view('/about', 'about');

    //Admin routes :
    Route::view('/loginAdmin', 'admin')->name('login');
    Route::post('/loginAdmin', [AdminController::class, 'adminLogin']);
    Route::view('/menuAdmin', 'menuAdmin')->middleware('auth');
    Route::post('/adminLogout', [AdminController::class, 'adminLogout']);

    //events routes:
    Route::view('/eventsForm', 'eventsForm')->middleware('auth');
    Route::post('/eventsForm', [EventsController::class, 'eventsForm']);
    Route::get('/', [EventsController::class, 'events']);

    //offres routes :
    Route::get('/offres', [OffresController::class, 'offres']);
    Route::post('/offres', [OffresController::class, 'publierOffre'])->middleware('auth');
    Route::get('/pdfDownload{pdf}', [OffresController::class, 'pdfDownload'])->name('pdf.download');
    Route::get('/formulairOffre', [OffresController::class, 'formulair'])->middleware('auth');
    Route::get('/edit/{offre}', [OffresController::class, 'edit_offre'])->name('edit_offre')->middleware('auth');
    Route::put('/edit/{offre}', [OffresController::class, 'update_offre'])->middleware('auth');
    Route::delete('/delete/{offre}', [OffresController::class, 'delete_offre'])->name('delete_offre');

    //Traduction route ::
    Route::get('lang/{lang}', [LangController::class, 'langTrad']);

});
