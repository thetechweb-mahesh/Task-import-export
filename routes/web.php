<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group.
|
*/

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/data/export-test/{format}', [DataController::class, 'exportTest']);
Route::post('/data/export', [DataController::class, 'export']);
Route::post('/data/import', [DataController::class, 'import']);
