<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

//Rotta per la creazione di un nuovo annuncio
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->name('announcements.create')->middleware('auth');

//Rotta delle categorie
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');

//Rotta per il dettaglio del singolo annuncio 
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');

//Rotta per vedere tutti gli annunci
Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');

//Rotta Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//Annulla annuncio approvato/rifiutato
Route::post('/annulla/annuncio/{announcement}', [RevisorController::class, 'revertAnnouncement'])->middleware('isRevisor')->name('revisor.revert_announcement');

//Diventa revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//Rendere utente revisore
Route::get('make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Ricerca annuncio
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

//Cambio lingua
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');
