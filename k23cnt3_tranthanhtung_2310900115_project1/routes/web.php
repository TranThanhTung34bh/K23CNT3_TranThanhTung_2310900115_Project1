<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTT_QUAN_TRIController;
use App\Http\Controllers\LoaiSanPhamcontroller;
use App\Http\Controllers\TTT_SAN_PHAMController;
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
Route::get('/ttt-admins', function () {
    return view('tttAdmins.index');
});

// Admins - Danh Mục
Route::get('/ttt-admins/danhmuc', function () {
    return view('tttAdmins.tttdanhmuc');
});
Route::get('LoaiSanPham/tttCreate', [LoaiSanPhamController::class, 'tttCreate'])->name('ttt-admins.LoaiSanPham.tttCreate');

// Loại Sản Phẩm
// List
Route::get('/ttt-admins/LoaiSanPham', [LoaiSanPhamcontroller::class, 'tttList'])->name('tttadmins.LoaiSanPham');
// create
Route::get('/ttt-admins/LoaiSanPham/tttCreate', [LoaiSanPhamcontroller::class, 'tttCreate'])->name('tttadmins.LoaiSanPham.tttCreate');
Route::post('/ttt-admins/LoaiSanPham/tttCreate', [LoaiSanPhamcontroller::class, 'tttCreateSubmit'])->name('tttadmins.LoaiSanPham.tttCreateSubmit');
Route::get('tttadmins/LoaiSanPham/tttIndex', [LoaiSanPhamController::class, 'index'])->name('tttadmins.LoaiSanPham.tttIndex');

// Edit
Route::get('/ttt-admins/LoaiSanPham/tttEdit/{id}', [LoaiSanPhamcontroller::class, 'tttEdit'])->name('tttadmins.LoaiSanPham.tttEdit');
Route::post('/ttt-admins/LoaiSanPham/tttEdit', [LoaiSanPhamcontroller::class, 'tttEditSubmit'])->name('tttadmins.LoaiSanPham.tttEditSubmit');
// Detail
Route::get('/ttt-admins/LoaiSanPham/tttDetail/{id}', [LoaiSanPhamcontroller::class, 'tttgetDetail'])->name('tttadmins.LoaiSanPham.tttgetDetail');
// Delete
Route::get('/ttt-admins/LoaiSanPham/tttDelete/{id}', [LoaiSanPhamcontroller::class, 'tttDelete'])->name('tttadmins.LoaiSanPham.tttDelete');

// Sản Phẩm
// List
Route::get('/ttt-admins/tttsanpham', [TTT_SAN_PHAMController::class, 'tttList'])->name('tttadmins.tttsanpham');
// create
Route::get('/ttt-admins/tttsanpham/tttCreate', [TTT_SAN_PHAMController::class, 'tttCreate'])->name('tttadmins.tttsanpham.tttCreate');
Route::post('/ttt-admins/tttsanpham/tttCreate', [TTT_SAN_PHAMController::class, 'tttCreateSubmit'])->name('tttadmins.tttsanpham.tttreateSubmit');
// Detail
Route::get('/ttt-admins/tttsanpham/tttDetail/{id}', [TTT_SAN_PHAMController::class, 'tttDetail'])->name('tttadmins.tttsanpham.tttDetail');
// Edit
Route::get('/ttt-admins/tttsanpham/tttEdit/{id}', [TTT_SAN_PHAMController::class, 'tttEdit'])->name('tttadmins.tttsanpham.tttEdit');
Route::post('/ttt-admins/tttsanpham/tttEdit/{id}', [TTT_SAN_PHAMController::class, 'tttEditSubmit'])->name('tttadmins.tttsanpham.tttEditSubmit');
// Delete
Route::get('/ttt-admins/tttsanpham/tttDelete/{id}', [TTT_SAN_PHAMController::class, 'tttDelete'])->name('tttadmins.tttsanpham.tttDelete');
