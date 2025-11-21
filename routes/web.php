<?php

use App\Http\Controllers\ContacteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'home'])->name('accueil');

Route::get('/apropos', [HomeController::class,'apropos'])->name('apropos');

Route::get('/nos-offres', [HomeController::class,'offres'])->name('offres');

Route::get('/nous-contacter', [HomeController::class,'contact'])->name('contacte');

Route::post('/contact',[ContacteController::class,'contacte'])->name('email.contact');
Route::post('/email-demande-service',[ContacteController::class,'demandeForm'])->name('email.demande');