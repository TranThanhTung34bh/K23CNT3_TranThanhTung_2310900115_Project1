<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTT_QUAN_TRIController;
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

Route::get('/ttt-login', [TTT_QUAN_TRIController::class, 'TttLogin'])->name('ttt-login');
Route::post('/ttt-login', [TTT_QUAN_TRIController::class, 'TttLoginSubmit'])->name('ttt-login.submit');
Route::post('/ttt-logout', [TTT_QUAN_TRIController::class, 'TttLogout'])->name('ttt-logout');

