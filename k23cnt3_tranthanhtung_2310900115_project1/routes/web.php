<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTT_QUAN_TRIController;
use App\Http\Controllers\LoaiSanPhamcontroller;
use App\Http\Controllers\TTT_SanPhamController;
use App\Models\LoaiSanPham;

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

// Admin Login
Route::get('/admins/ttt-login', [TTT_QUAN_TRIController::class, 'tttLogin'])->name('admins.tttLogin');
Route::post('/admins/ttt-login', [TTT_QUAN_TRIController::class, 'tttLoginSubmit'])->name('admins.tttLoginSubmit');

// Admins Home
Route::get('/tttAdmins', function () {
    return view('tttAdmins.tttIndex');
});

// Admins - Danh Mục
Route::get('/tttAdmins/danhmuc', function () {
    return view('tttAdmins.tttdanhmuc');
});
Route::get('LoaiSanPham/tttCreate', [LoaiSanPhamController::class, 'tttCreate'])->name('tttAdmins.LoaiSanPham.tttCreate');

// Loại Sản Phẩm
// List
Route::get('/tttAdmins/LoaiSanPham', [LoaiSanPhamcontroller::class, 'tttList'])->name('tttAdmins.LoaiSanPham');
// create
Route::get('/tttAdmins/LoaiSanPham/tttCreate', [LoaiSanPhamcontroller::class, 'tttCreate'])->name('tttAdmins.LoaiSanPham.tttCreate');
Route::post('/tttAdmins/LoaiSanPham/tttCreate', [LoaiSanPhamcontroller::class, 'tttCreateSubmit'])->name('tttAdmins.LoaiSanPham.tttCreateSubmit');
Route::get('tttAdmins/LoaiSanPham/tttIndex', [LoaiSanPhamController::class, 'index'])->name('tttAdmins.LoaiSanPham.tttIndex');

// Edit
Route::get('/tttAdmins/LoaiSanPham/tttEdit/{id}', [LoaiSanPhamcontroller::class, 'tttEdit'])->name('tttAdmins.LoaiSanPham.tttEdit');
Route::get('/tttAdmins/LoaiSanPham/tttEdit/{id}', [LoaiSanPhamcontroller::class, 'tttEditSubmit'])->name('tttAdmins.LoaiSanPham.tttEditSubmit');
// Detail
Route::get('/tttAdmins/LoaiSanPham/tttDetail', [LoaiSanPhamController::class, 'detail'])->name('tttAdmins.LoaiSanPham.tttDetail');
Route::get('/tttAdmins/LoaiSanPham/tttDetail/{id}', [LoaiSanPhamcontroller::class, 'tttgetDetail'])->name('tttAdmins.LoaiSanPham.tttgetDetail');
// Delete
Route::get('/tttAdmins/LoaiSanPham/tttDelete/{id}', [LoaiSanPhamcontroller::class, 'tttDelete'])->name('tttAdmins.LoaiSanPham.tttDelete');

// Sản Phẩm
// List
Route::get('/tttAdmins/ttt_SanPham', [TTT_SanPhamController::class, 'tttList'])->name('tttAdmins.ttt_SanPham');
// Create
Route::get('/tttAdmins/ttt_SanPham/tttCreate', [TTT_SanPhamcontroller::class, 'tttCreate'])->name('tttAdmins.ttt_SanPham.tttCreate');
Route::post('/tttAdmins/ttt_SanPham/tttCreate', [TTT_SanPhamcontroller::class, 'tttCreateSubmit'])->name('tttAdmins.ttt_SanPham.tttCreateSubmit');
Route::get('/tttAdmins/ttt_SanPham/tttIndex', [TTT_SanPhamController::class, 'index'])->name('tttAdmins.ttt_SanPham.tttIndex');

// Edit
Route::get('/tttAdmins/ttt_SanPham/tttEdit/{id}', [TTT_SanPhamController::class, 'tttEdit'])->name('tttAdmins.ttt_SanPham.tttEdit');
Route::post('/tttAdmins/ttt_SanPham/tttEdit/{id}', [TTT_SanPhamController::class, 'tttEditSubmit'])->name('tttAdmins.ttt_SanPham.tttEditSubmit');

// Detail
Route::get('/tttAdmins/ttt_SanPham/tttDetail', [TTT_SanPhamController::class, 'detail'])->name('tttAdmins.ttt_SanPham.tttDetail');
Route::get('/tttAdmins/ttt_SanPham/tttDetail/{id}', [TTT_SanPhamController::class, 'tttgetDetail'])->name('tttAdmins.ttt_SanPham.tttgetDetail');

// Delete
Route::get('/tttAdmins/ttt_SanPham/tttDelete/{id}', [TTT_SanPhamController::class, 'tttDelete'])->name('tttAdmins.ttt_SanPham.tttDelete');
