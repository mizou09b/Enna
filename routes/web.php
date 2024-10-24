<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OffresController;
use App\Http\Controllers\EventsController;


Route::middleware(['LangTradMiddleware'])->group(function () {

    //  User routes :
    Route::view('/about', 'users.about')->name('about');
    Route::get('/', [AdminController::class, 'ennaNumbersDataAndEVents'])->name('homepage');

    //Admin routes :
    Route::view('loginAdmin', 'admin.admin')->name('login');
    Route::post('loginAdmin', [AdminController::class, 'adminLogin']);
    Route::view('menuAdmin', 'admin.menuAdmin')->name('menuAdmin')->middleware('auth');
    Route::post('adminLogout', [AdminController::class, 'adminLogout']);

    //events routes:
    Route::get('events', [EventsController::class, 'events']);
    Route::view('eventsForm', 'eventsViews.eventsForm')->middleware('auth');
    Route::post('eventsForm', [EventsController::class, 'eventsForm']);
    Route::get('edit/event/{event}', [EventsController::class, 'edit_event'])->name('edit_event')->middleware('auth');
    Route::put('edit/event/{event}', [EventsController::class, 'update_event'])->middleware('auth');
    Route::delete('delete/event/{event}', [EventsController::class, 'delete_event'])->name('delete_event');

    //offres routes :
    Route::get('offres', [OffresController::class, 'offres']);
    Route::post('offres', [OffresController::class, 'publierOffre'])->middleware('auth');
    Route::get('pdfDownload{pdf}', [OffresController::class, 'pdfDownload'])->name('pdf.download');
    Route::get('formulairOffre', [OffresController::class, 'formulair'])->middleware('auth');
    Route::get('edit/offre/{offre}', [OffresController::class, 'edit_offre'])->name('edit_offre')->middleware('auth');
    Route::put('edit/offre/{offre}', [OffresController::class, 'update_offre'])->middleware('auth');
    Route::delete('delete/offre/{offre}', [OffresController::class, 'delete_offre'])->name('delete_offre');

    // enna numbers routes :
    Route::get('ennaNumbers', [AdminController::class, 'ennaNumbers'])->middleware('auth')->name('ennaNumbers');
    Route::post('ennaNumbers', [AdminController::class, 'ennaNumbersForm'])->name('ennaNumbers');

    //Traduction route ::
    Route::get('lang/{lang}', [LangController::class, 'langTrad']);

});
