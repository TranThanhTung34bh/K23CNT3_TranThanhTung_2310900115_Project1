<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TTT_QUAN_TRIController;
use App\Http\Controllers\LoaiSanPhamcontroller;
use App\Http\Controllers\TTT_SAN_PHAMController;

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

// Loại Sản Phẩm
// List
Route::get('/ttt-admins/tttloaisanpham', [LoaiSanPhamcontroller::class, 'tttList'])->name('tttadmins.tttloaisanpham');
// create
Route::get('/ttt-admins/tttloaisanpham/tttcreate', [LoaiSanPhamcontroller::class, 'tttcreate'])->name('tttadmins.tttloaisanpham.tttcreate');
Route::post('/ttt-admins/tttloaisanpham/tttcreate', [LoaiSanPhamcontroller::class, 'tttcreateSubmit'])->name('tttadmins.tttloaisanpham.tttcreateSubmit');
// edit
Route::get('/ttt-admins/tttloaisanpham/tttedit/{id}', [LoaiSanPhamcontroller::class, 'tttedit'])->name('tttadmins.tttloaisanpham.tttedit');
Route::post('/ttt-admins/tttloaisanpham/tttedit', [LoaiSanPhamcontroller::class, 'ttteditSubmit'])->name('tttadmins.tttloaisanpham.ttteditSubmit');
// Detail
Route::get('/ttt-admins/tttloaisanpham/tttdetail/{id}', [LoaiSanPhamcontroller::class, 'tttgetdetail'])->name('tttadmins.tttloaisanpham.tttgetdetail');
// delete
Route::get('/ttt-admins/tttloaisanpham/tttdelete/{id}', [LoaiSanPhamcontroller::class, 'tttdelete'])->name('tttadmins.tttloaisanpham.tttdelete');

// Sản Phẩm
// List
Route::get('/ttt-admins/tttsanpham', [TTT_SAN_PHAMController::class, 'tttList'])->name('tttadmins.tttsanpham');
// create
Route::get('/ttt-admins/tttsanpham/tttcreate', [TTT_SAN_PHAMController::class, 'tttcreate'])->name('tttadmins.tttsanpham.tttcreate');
Route::post('/ttt-admins/tttsanpham/tttcreate', [TTT_SAN_PHAMController::class, 'tttcreateSubmit'])->name('tttadmins.tttsanpham.tttreateSubmit');
// Detail
Route::get('/ttt-admins/tttsanpham/tttdetail/{id}', [TTT_SAN_PHAMController::class, 'tttDetail'])->name('tttadmins.tttsanpham.tttDetail');
// edit
Route::get('/ttt-admins/tttsanpham/tttedit/{id}', [TTT_SAN_PHAMController::class, 'tttedit'])->name('tttadmins.tttsanpham.tttedit');
Route::post('/ttt-admins/tttsanpham/tttedit/{id}', [TTT_SAN_PHAMController::class, 'ttteditSubmit'])->name('tttadmins.tttsanpham.ttteditSubmit');
// delete
Route::get('/ttt-admins/tttsanpham/tttdelete/{id}', [TTT_SAN_PHAMController::class, 'tttdelete'])->name('tttadmins.tttsanpham.tttdelete');
