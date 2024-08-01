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
use App\Http\Controllers\HomeController;

Route::get('admin', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\KhachHangController;

Route::get('admin/khachhang', [KhachHangController::class, 'index'])->name('khachhang.index');
Route::get('admin/khachhang/{id}/edit', [KhachHangController::class, 'edit'])->name('khachhang.edit');
Route::put('admin/khachhang/{id}', [KhachHangController::class, 'update'])->name('khachhang.update');
Route::delete('admin/khachhang/{id}', [KhachHangController::class, 'destroy'])->name('khachhang.destroy');
Route::get('admin/addkh', [KhachHangController::class, 'create'])->name('khachhang.create');
Route::post('admin/addkh', [KhachHangController::class, 'store'])->name('khachhang.store');

// 

use App\Http\Controllers\SanPhamController;
Route::get('admin/sanpham', [SanPhamController::class, 'viewsp'/*tên hàm*/])->name('sanpham.viewsp');
Route::get('admin/sanpham/{id}/edit', [SanPhamController::class, 'edit'])->name('sanpham.edit');
Route::put('admin/sanpham/{id}', [SanPhamController::class, 'update'])->name('sanpham.update');
Route::delete('admin/sanpham/{id}', [SanPhamController::class, 'destroy'])->name('sanpham.destroy');
Route::get('admin/addsp', [SanPhamController::class, 'create'])->name('sanpham.create');
Route::post('admin/addsp', [SanPhamController::class, 'store'])->name('sanpham.store');
 
use App\Http\Controllers\InvoiceController;

Route::get('admin/hoadon', [InvoiceController::class, 'index'/*tên hàm*/])->name('invoices.index');
Route::get('admin/hoadon/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('admin/hoadon/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::delete('admin/hoadon/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::get('admin/addhoadon', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('admin/addhoadon', [InvoiceController::class, 'store'])->name('invoices.store');

use App\Http\Controllers\InvoiceDetailController;

//Route::resource('invoices', InvoiceController::class);

Route::get('admin/invoices/{invoice}/details', [InvoiceDetailController::class, 'index'])->name('invoice_details.index');
Route::get('admin/invoices/{invoice}/details/create', [InvoiceDetailController::class, 'create'])->name('invoice_details.create');
Route::post('admin/invoices/{invoice}/details', [InvoiceDetailController::class, 'store'])->name('invoice_details.store');
Route::get('admin/invoices/{invoice}/details/{detail}/edit', [InvoiceDetailController::class, 'edit'])->name('invoice_details.edit');
Route::put('admin/invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'update'])->name('invoice_details.update');
Route::delete('admin/invoices/{invoice}/details/{detail}', [InvoiceDetailController::class, 'destroy'])->name('invoice_details.destroy');



