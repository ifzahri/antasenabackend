<?php

use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/visitors', VisitorController::class);
Route::get('/create-pdf-file', [App\Http\Controllers\PDFController::class, 'generatePDF']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
