<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTT_QUAN_TRIController;
use App\Http\Controllers\LoaiSanPhamController;
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

Route::get('/ttt-admins', function () {
    return view('tttAdmins.index');
});


Route::post('/ttt-logout', [TTT_QUAN_TRIController::class, 'TttLogout'])->name('ttt-logout');
Route::get('/ttt-admins/loai-san-pham', [LoaiSanPhamController::class,'tttList'])->name('tttAdmins.LoaiSanPham');
Route::get('/ttt-admins/loai-san-pham/tttCreate',[LoaiSanPhamController::class,'tttCreate'])->name('tttAdmins.LoaiSanPham.tttCreate');
