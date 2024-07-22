<?php

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
Route::get('/hehe', function () {
    return "hello ";
});
Route::get('/hehe/{id}', function ($id) {
    return "Chi tiết: ".$id;
});
Route::get('/hello', [App\Http\Controllers\HelloController::class, 'show']);
//

use App\Http\Controllers\KhachHangController;

Route::get('/khachhang', [KhachHangController::class, 'index'])->name('khachhang.index');
Route::get('/addkh', [KhachHangController::class, 'create'])->name('khachhang.create');
Route::post('/khachhang', [KhachHangController::class, 'store'])->name('khachhang.store');
Route::get('/khachhang/{id}/edit', [KhachHangController::class, 'edit'])->name('khachhang.edit');
Route::put('/khachhang/{id}', [KhachHangController::class, 'update'])->name('khachhang.update');
Route::delete('/khachhang/{id}', [KhachHangController::class, 'destroy'])->name('khachhang.destroy');
// 

use App\Http\Controllers\SanPhamController;

Route::get('/sanpham', [SanPhamController::class, 'viewsp'/*tên hàm*/])->name('sanpham.viewsp');
Route::get('/sanpham/{id}/edit', [SanPhamController::class, 'edit'])->name('sanpham.edit');
Route::put('/sanpham/{id}', [SanPhamController::class, 'update'])->name('sanpham.update');
Route::delete('/sanpham/{id}', [SanPhamController::class, 'destroy'])->name('sanpham.destroy');

Route::get('/addsp', [SanPhamController::class, 'create'])->name('sanpham.create');
Route::post('/addsp', [SanPhamController::class, 'store'])->name('sanpham.store');



