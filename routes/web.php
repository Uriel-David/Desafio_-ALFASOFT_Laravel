<?php

use App\Http\Controllers\ContactController;
use App\Models\Contact;
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

Route::get('/', [ContactController::class, 'index']);
Route::get('/contact/contacts-trashed', [ContactController::class, 'contactsTrashed'])->name('contact.trashed');
Route::get('/contact/restore/{contact}', [ContactController::class, 'restore'])->name('contact.restore');
Route::get('/contact/restore-all', [ContactController::class, 'restoreAll'])->name('contact.restoreAll');
Route::resource('/contact', ContactController::class);
