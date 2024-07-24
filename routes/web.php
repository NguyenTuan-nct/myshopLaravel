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

use App\Http\Controllers\InvoiceController;
Route::resource('invoices', InvoiceController::class);


use App\Http\Controllers\InvoiceDetailController;

Route::resource('invoices', InvoiceController::class);

Route::get('invoices/{invoice}/details', [InvoiceDetailController::class, 'index'])->name('invoice_details.index');
Route::get('invoices/{invoice}/details/create', [InvoiceDetailController::class, 'create'])->name('invoice_details.create');
Route::post('invoices/{invoice}/details', [InvoiceDetailController::class, 'store'])->name('invoice_details.store');
Route::get('invoices/{invoice}/details/{detail}/edit', [InvoiceDetailController::class, 'edit'])->name('invoice_details.edit');
Route::put('invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'update'])->name('invoice_details.update');
Route::delete('invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'destroy'])->name('invoice_details.destroy');
