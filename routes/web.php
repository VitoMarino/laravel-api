<?php

// ADMIN
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

//GUEST
use App\Http\Controllers\HomeController as GuestHomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [GuestHomeController::class, 'index'])->name('home');

// Questo sistema serve per raggruppare tutte le rotte e avere dei prefissi e un raggruppamento che mi velocizza la scrittura delle rotte
Route::middleware('auth')->name('admin.')->prefix('admin/')->group(
    function () {
        // Qui sotto posso raggruppare e scrivere le mie rotte


        // Mi creo anche una risorsa
        Route::resource('/projects', AdminProjectController::class);
    }
);
